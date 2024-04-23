<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Price;
use App\Models\Product;
use App\Models\ProductFeature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Intervention\Image\Laravel\Facades\Image;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ProductController extends Controller
{
    public function index()
    {
        $locales = Language::all()->toArray();

        return view('admin.pages.products', compact('locales'));
    }


    public function store(Request $request)
    {

//        dd($request);

        $locales = Language::all()->toArray();
        $rules   = [];


        $start = hrtime(true);

        foreach ($locales as $locale) {
//            dd($locale["abbr"]);
            $rules["product_name".$locale["abbr"]]      = 'required|string|max:255';// Adjust validation rules as needed
            $rules["short_description".$locale["abbr"]] = 'required|string';
            $rules["long_description".$locale["abbr"]]  = 'required|string';
            $rules["price"]                             = 'required|numeric';

        }

        $validatedData = $request->validate($rules);

        $product = new Product();

        foreach ($locales as $index => $locale) {
            if ($request->has('product_name'.$locale['abbr'])) {
                $product->setTranslation('product_name', $locale['abbr'],
                    $request->input('product_name'.$locale['abbr']));
                $product->setTranslation('product_short_description', $locale['abbr'],
                    $request->input('short_description'.$locale['abbr']));
                $product->setTranslation('product_long_description', $locale['abbr'],
                    $request->input('long_description'.$locale['abbr']));
            }
        }


        if ($request->has('for_landing')) {
            $product->for_landing = 1;
        }
        $product->save();


        $price             = new Price();
        $price->price      = $request->price;
        $price->product_id = $product->id;
        $price->save();

        $end = hrtime(true);

        logExecutionTime('creaate new product', $start, $end);


        $start2 = hrtime(true);


        if ($request->has('photo')) {

            foreach ($request->photo as $image) {
                // Decode the base64 image data
                $decodedImageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $image));

                // Generate a unique filename for the converted image
                $filename = 'converted_image_' . time() . '.webp';

                // Store the image data using Laravel's storage system
                Storage::disk('public')->put($filename, $decodedImageData);

                // Add the converted image to the media library
                 $product->addMedia(storage_path('app/public/' . $filename))
                    ->toMediaCollection('product_image');

                // Delete the temporary file
                Storage::disk('public')->delete($filename);

            }


        }

//        $manager = new ImageManager(new Driver());
//        $img     = $manager->read($request->file('product_image'));
//        $resized = $img->resize(320, 494);
//        $name    = $request->file('product_image')->getClientOriginalName();
//        $resized->toJpeg(80)->save(public_path('productImage/'.$name));
//
//        $product->addMedia(public_path('productImage/'.$name))
//            ->toMediaCollection('product_image');

        $end2 = hrtime(true);

        logExecutionTime('Create product photo', $start2, $end2);

        //  first storing main locale features translation and then setting other translations on it
        if ($request->feature) {
            foreach ($request->feature[app()->getLocale()] as $feature) {
                $productFeature = new ProductFeature();
                $productFeature->setTranslation('feature', app()->getLocale(), $feature);
                $productFeature->product_id = $product->id;
                $productFeature->save();
            }

            $CreatedFeature = ProductFeature::where('product_id', $product->id)->get();
            $translations   = $request->feature;
            $indexes        = array_keys($translations);

            foreach ($translations as $locale => $value) {
                foreach ($value as $key => $feature) {
                    $CreatedFeature[$key]->setTranslation('feature', $locale, $feature);
                    $CreatedFeature[$key]->save();
                }
            }
        }

        return back()->with('locales', $locales);

    }


    public function allProduct()
    {
        $products = Product::with('prices', 'media', 'features')->get();
        $locales  = Language::all()->toArray();

        return view('admin.pages.all-products', compact('locales', 'products'));
    }


    public function changeProductPosition(Request $request)
    {

        $locales = Language::all()->toArray();
        $product = Product::where('id', $request->id)->first();

        $product->position = $request->position;
        $product->save();

        return back()->with('locales', $locales);

    }

    public function priceUpdate(Request $request)
    {

        $product         = Product::where('id', $request->id)->first();
        $newPrice        = new Price();
        $newPrice->price = $request->newprice;
        $product->prices()->save($newPrice);
        $product->save();

        $unpaidOrders=Order::where('paid',0)->get();

        // თუ არის გადაუხდელი შეკვეთა და ფასი შევცვალე , პივოთ თეიბლში ფასის აიდი განახლდეს ახალი ფასის აიდით
        foreach($unpaidOrders as $order){
            $orderproducts=OrderProduct::where('order_id',$order->id)->get();
            foreach($orderproducts as $orderproduct){
                $orderproduct->price_id=$newPrice->id;
                $orderproduct->save();
            }
        }

        $locales         = Language::all()->toArray();


        return back()->with('locales', $locales);

    }

    public function forLandingUpdate(Request $request)
    {


        $locales = Language::all()->toArray();
        $product = Product::where('id', $request->id)->first();
        if ($product->for_landing === 1) {
            $product->for_landing = 0;
        } else {
            $product->for_landing = 1;
        }
        $product->save();

        return back()->with('locales', $locales);
    }

    public function changeProductStatus(Request $request)
    {

        $locales = Language::all()->toArray();
        $product = Product::where('id', $request->id)->first();
        if ($product->active === 1) {
            $product->active = 0;
        } else {
            $product->active = 1;
        }
        $product->save();

        return back()->with('locales', $locales);
    }

    public function deleteProduct(Request $request)
    {

        $locales = Language::all()->toArray();
        $product = Product::where('id', $request->id)->with('media')->first();
        $prices  =Price::where('product_id', $request->id)->get();
        foreach($prices as $price){
            $price->delete();
        }

        foreach($product->media as $media){
            $media->delete();
        }
        $product->delete();

        return back()->with('locales', $locales);
    }

    public function updateFeatures(Request $request)
    {

//        dd($request->all());

        $product = Product::where('id', $request->id)->with('features')->first();

        // if There is no feature in database and new feature is added
        if ($request->has('feature') && $product->features->count() == 0) {
            foreach ($request->feature as $id => $feature) {
                foreach ($feature as $translation) {
                    $newFeature             = new ProductFeature();
                    $newFeature->product_id = $request->id;
                    $newFeature->setTranslation('feature', app()->getLocale(), $translation);
                    $newFeature->save();
                }

            }
        } elseif
//   If There is less features in database If feature is Added
        ($request->has('feature') && $product->features->count() !== 0 && $product->features->count() < count($request->feature)) {
            foreach ($request->feature as $id => $feature) {
                foreach ($feature as $translation) {
                    $oldFeature = ProductFeature::where('id', $id)->first();
                    if ($oldFeature) {
                        $oldFeature->setTranslation('feature', app()->getLocale(), $translation);
                        $oldFeature->save();
                    } else {
                        $newFeature             = new ProductFeature();
                        $newFeature->product_id = $request->id;
                        $newFeature->setTranslation('feature', app()->getLocale(), $translation);
                        $newFeature->save();
                    }
                }
            }

        } elseif
//      If There is More features in database  If fteature is deleted
        ($product->features->count() !== 0 && $product->features->count() > count($request->feature)) {
            $onlyFeature = ProductFeature::where('product_id', $request->id)->get();

            foreach ($onlyFeature as $feature) {
                foreach ($request->feature as $id => $feature2) {
//                      dd($feature->id!=$id);
                    if ($feature->id != $id) {
                        $feature->delete();
                    }
                }
            }


        } else {
//   if there  Same  features in database if Feature is Updated
            if ($request->has('feature')) {
                foreach ($request->feature as $id => $feature) {

                    foreach ($feature as $translation) {
                        $oldFeture = ProductFeature::where('id', $id)->first();
                        $oldFeture->setTranslation('feature', app()->getLocale(), $translation);
                        $oldFeture->save();
                    }

                }
            }
        }


        return back();

    }

    public function updateShortDescr(Request $request)
    {

        $product = Product::where('id', $request->id)->with('features')->first();

        $product->setTranslation('product_short_description', app()->getLocale(), $request->shortdescr);
        $product->save();

        return back();

    }

    public function updateLongDescr(Request $request)
    {

        $product = Product::where('id', $request->id)->with('features')->first();

        $product->setTranslation('product_long_description', app()->getLocale(), $request->longdescr);
        $product->save();

        return back();
    }


    public function updateProdName(Request $request)
    {


        $product = Product::where('id', $request->id)->with('features')->first();
        $product->setTranslation('product_name', app()->getLocale(), $request->prodname);
        $product->update();

        return back();
    }

    public function changePhoto(Request $request,$locale,$id){

//        dd($id);
        $locales = Language::all()->toArray();

        return view('admin.pages.change-photo',compact('id','locales'));
    }

    public function updatePhotos(Request $request){

//        dd($request->id);

        $product = Product::where('id', $request->id)->with('media')->first();
        foreach ($product->media as $media){
            $media->delete();
        }

        if ($request->has('photo')) {

            foreach ($request->photo as $image) {
                // Decode the base64 image data
                $decodedImageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $image));

                // Generate a unique filename for the converted image
                $filename = 'converted_image_' . time() . '.webp';

                // Store the image data using Laravel's storage system
                Storage::disk('public')->put($filename, $decodedImageData);

                // Add the converted image to the media library
                $product->addMedia(storage_path('app/public/' . $filename))
                    ->toMediaCollection('product_image');

                // Delete the temporary file
                Storage::disk('public')->delete($filename);

            }
        }


        $products = Product::with('prices', 'media', 'features')->get();
        $locales  = Language::all()->toArray();

        return view('admin.pages.all-products', compact('locales', 'products'));

    }

}
