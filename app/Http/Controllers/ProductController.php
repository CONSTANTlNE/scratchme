<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\Price;
use App\Models\Product;
use App\Models\ProductFeature;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Intervention\Image\Laravel\Facades\Image;

class ProductController extends Controller
{
    public function index()
    {
        $locales = Language::all()->toArray();

        return view('admin.pages.products', compact('locales'));
    }


    public function store(Request $request)
    {

//        dd($request->feature);


        $locales = Language::all()->toArray();
        $product = new Product();

        foreach ($locales as $index => $locale) {
//            dd($request->input('product_name' . $locale['abbr']));
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

        if ($request->hasFile('product_image')) {
            $manager = new ImageManager(new Driver());
            $img     = $manager->read($request->file('product_image'));
            $resized = $img->resize(320, 494);
            $name    = $request->file('product_image')->getClientOriginalName();
            $resized->toJpeg(80)->save(public_path('productImage/'.$name));

            $product->addMedia(public_path('productImage/'.$name))
                ->toMediaCollection('product_image');

//            unlink(public_path('productImage/'.$name));
        }


        //  first storing main locale translation and then setting other translations on it

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

        $locales         = Language::all()->toArray();
        $product         = Product::where('id', $request->id)->first();
        $newPrice        = new Price();
        $newPrice->price = $request->newprice;
        $product->prices()->save($newPrice);
        $product->save();

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
        $product = Product::where('id', $request->id)->first();
        $product->delete();

        return back()->with('locales', $locales);
    }

    public function updateFeatures(Request $request)
    {

//        dd($request->all());
        $locales = Language::all()->toArray();

        $product = Product::where('id', $request->id)->with('features')->first();

        // if nothing new is added
        if ($request->has('feature') && $product->features->count() == 0) {
            foreach ($request->feature as $id => $feature) {
                dd($id);

                $product->setTranslation('feature', app()->getLocale(), $feature);
                $product->save();
            }
        } elseif

        ($request->has('feature') && $product->features->count() !== 0 && $product->features->count() < count($request->feature)) {
            foreach ($request->feature as $index => $feature) {
                $product->features[$index]->delete();
            }

            foreach ($request->feature as $feature) {
                $newFeature             = new ProductFeature();
                $newFeature->product_id = $product->id;
                $newFeature->feature    = $feature;
                $newFeature->save();
            }

        } else {
            foreach ($product->features as $index => $feature) {
                $product->features[$index]->delete();
            }

            if ($request->has('feature')) {
                foreach ($request->feature as $feature) {
                    $newFeature             = new ProductFeature();
                    $newFeature->product_id = $product->id;
                    $newFeature->feature    = $feature;
                    $newFeature->save();
                }
            }
        }

        return back()->with('locales', $locales);

    }

    public function updateShortDescr(Request $request)
    {

    }

    public function updateLongDescr(Request $request)
    {

    }

}
