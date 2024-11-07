<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\CouponDiscount;
use App\Models\Delivery;
use App\Models\DeliveryPrice;
use App\Models\Language;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Term;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{

    public function adminMain()
    {
        $locales = Language::all()->toArray();

        return view('admin.index', compact('locales'));
    }


    public function languages()
    {
        $locales = Language::orderBy('position', 'asc')->get()->toArray();


        $languages = Language::orderBy('position', 'asc')->get();


        return view('admin.localization.languages', compact('languages', 'locales'));
    }

    public function createLanguage(Request $request)
    {


        $request->validate([
            'abbr'     => 'required|string|max:2',
            'language' => 'required|string',
        ]);

        $locales = Language::all()->toArray();
        // ენის შექმნა ბაზაში
        $lang           = new Language();
        $lang->abbr     = $request->input('abbr');
        $lang->language = $request->input('language');
        $lang->icon     = $request->input('icon');
        $lang->position = count($locales) + 1;

        $lang->save();


        $baselangfile = $locales[0]['abbr'].'.json';
        $baselangpath = base_path('lang/'.$baselangfile);
        $languageCode = $request->input('abbr');
        $fileName     = $languageCode.'.json';
        $fullPath     = base_path('lang');
        $content      = '{}';
        $filePath     = $fullPath.DIRECTORY_SEPARATOR.$fileName;

        // როცა ძირითდი ენა არსებობს key გადაიტანოს ახალ ენაში
        if (file_exists($baselangpath)) {

            $content      = file_get_contents($baselangpath);
            $existingData = json_decode($content, true);

            $keys                  = array_keys($existingData);
            $keysWithDefaultValues = array_fill_keys($keys, '');
            $newFilePath           = $fullPath.DIRECTORY_SEPARATOR.$fileName;
            $newContent            = json_encode($keysWithDefaultValues, JSON_PRETTY_PRINT);

            file_put_contents($newFilePath, $newContent);
        } else {

            file_put_contents($filePath, $content);
        }


        return back()->with('locales', $locales);
    }


    public function deleteLanguage(Request $request)
    {

        $locales  = Language::all()->toArray();
        $language = Language::where('id', $request->id)->first();
        $language->delete();

        $fileName = $request->abbr.'.json';
        $filePath = base_path('lang/'.$fileName);
        if (File::exists($filePath)) {
            File::delete($filePath);
        }


        return back()->with('locales', $locales);
    }


    public function updateLangStatus(Request $request)
    {

        $locales  = Language::all()->toArray();
        $language = Language::where('id', $request->id)->first();
        if ($language->active == 1 && $language->main != 1) {
            $language->active = 0;
        } else {
            $language->active = 1;
        }
        $language->update();

        return back()->with('locales', $locales);
    }

    public function setMainLang(Request $request)
    {

        $locales = Language::all()->toArray();

        $language     = Language::where('id', $request->id)->first();
        $allLanguages = Language::all();
        foreach ($allLanguages as $lang) {
            $lang->main = 0;
            $lang->update();
        }
        $language->main   = 1;
        $language->active = 1;

        $language->update();

        return back()->with('locales', $locales);

    }


    public function addTranslation(Request $request)
    {

        $locales = Language::all()->toArray();

        $main     = Language::where('main', 1)->pluck('abbr')->first();
        $jsonData = [];
        foreach ($locales as $locale) {
            $fileName = $locale['abbr'].'.json';
            $filePath = base_path('lang/'.$fileName);

            if (File::exists($filePath)) {
                // Read and decode JSON file
                $jsonData[$locale['abbr']] = json_decode(file_get_contents($filePath), true);
            }
        }


        $keys     = array_keys($jsonData['ka']);
        $keyCount = count($keys);


        return view('admin.localization.staticTranslation', compact('locales', 'main', 'jsonData', 'keys', 'keyCount'));
    }


    public function storeStaticTranslations(Request $request)
    {

        $languages = Language::all()->pluck('abbr')->toArray();

        foreach ($languages as $language) {

            $fileName = $language.'.json';
            $filePath = base_path('lang/'.$fileName);

            // Extract data from the request
            $key  = $request->key;
            $text = $request->$language;

            // Construct the array with dynamic key and language value
//            $data = [
//                $key => $text
//            ];

            $existingContent = file_get_contents($filePath);
            $existingData    = json_decode($existingContent, true);
            if (isset($existingData[$key])) {
                return back()->with('error', 'Key already exists');
            }
            $existingData[$key] = $text;

            $updatedContent = json_encode($existingData, JSON_UNESCAPED_UNICODE);

            // Save the updated content back to the file
            file_put_contents($filePath, $updatedContent);

        }

        return back();
    }

    public function updateStaticTranslation(Request $request)
    {

//        dd($request->all());
        $locales   = Language::all()->toArray();
        $languages = Language::all()->pluck('abbr')->toArray();


        // DELETE LOGIC
        if ($request->delete === 'delete') {

            $keys = $request->key;

            foreach ($languages as $index => $language) {

                $fileName = $language.'.json';
                $filePath = base_path('lang/'.$fileName);

                $content = file_get_contents($filePath);

                // Decode the JSON content into an associative array
                $data = json_decode($content, true);

                // Check if the key exists in the array
                if (isset($data[$keys[$index]])) {

                    unset($data[$keys[$index]]);
                    $newContent = json_encode($data, JSON_UNESCAPED_UNICODE);

                    file_put_contents($filePath, $newContent);

                }
            }
        } else {
            //  UPDATE LOGIC
            $abbr  = $request->abbr;
            $keys  = $request->key;
            $texts = $request->translation;
//            dd($abbr);

            foreach ($abbr as $index => $lang) {
                $fileName = $lang.'.json';
                $filePath = base_path('lang/'.$fileName);

                $key  = $keys[$index];
                $text = $texts[$index];

                $existingContent    = file_get_contents($filePath);
                $existingData       = json_decode($existingContent, true);
                $existingData[$key] = $text;

                $updatedContent = json_encode($existingData, JSON_UNESCAPED_UNICODE);

                // Save the updated content back to the file
                file_put_contents($filePath, $updatedContent);
            }

        }


        return back()->with('locales', $locales);
    }


    public function testPage()
    {

        $locales = Language::all()->toArray();

        return view('admin.localization.test', compact('locales'));
    }

    public function changePosition(Request $request)
    {

        $ids       = $request->input('id');
        $positions = $request->input('position');

        foreach ($positions as $index => $position) {
            $language           = Language::where('id', $ids[$index])->first();
            $language->position = $position;
            $language->save();
        }
    }


    public function htmxTest(Request $request)
    {

        $languages = Language::orderBy('position', 'asc')->get();

        return view('admin.localization.htmx', compact('languages',));
    }


    public function allOrders(Request $request)
    {

        $OrderProduct = OrderProduct::with('prices', 'order.couponDiscount')->get();
        $locales      = Language::all()->toArray();
        $orders       = Order::with('products', 'couponDiscount', 'user', 'delivery.prices')->get();


        return view('admin.pages.orders', compact('orders', 'locales', 'OrderProduct'));
    }


    public function singleOrder(Request $request, $locale, $orderID, $user)
    {

//        dd($order,$user);
        $orderproduct = OrderProduct::where('order_id', $orderID)
            ->with('prices', 'orderproducts.prices', 'order.couponDiscount',)
            ->get();

//        $order=Order::with('products','couponDiscount','user','delivery.prices')->where('id',$orderID)->where('user_id',$user)->first();
//        $couponDiscounts = CouponDiscount::where('id', $order->coupon_discount_id)->first();

//        $quantities = DB::table('order_product')
//            ->where('order_id', $order->id)->get();

        $locales = Language::all()->toArray();

        return view('admin.pages.single-order', compact('locales', 'orderproduct',));

    }

    public function delivery(Request $request)
    {

        $locales    = Language::all()->toArray();
        $deliveries = Delivery::with('prices')->get();

        return view('admin.pages.delivery', compact('deliveries', 'locales'));
    }

    public function createDelivery(Request $request)
    {

        $delivery        = new Delivery();
        $delivery->title = $request->delivery_name;
        $delivery->save();

        $price              = new DeliveryPrice();
        $price->delivery_id = $delivery->id;
        $price->price       = $request->delivery_price;
        $price->save();

        return back();

    }

    public function aboutUs(Request $request)
    {

        $locales = Language::all()->toArray();

        $about   = About::with('media')->first();

        return view('admin.pages.about', compact('locales','about' ));


    }

    public function createAbout(Request $request)
    {

        $about = new About();
        $about->setTranslation('title1', 'en', $request->title1_en);
        $about->setTranslation('title2', 'en', $request->title2_en);
        $about->setTranslation('content', 'en', $request->content_en);
        $about->setTranslation('title1', 'ka', $request->title1_ka);
        $about->setTranslation('title2', 'ka', $request->title2_ka);
        $about->setTranslation('content', 'ka', $request->content_ka);
        $about->save();

        return back();
    }

    public function updateAbout(Request $request)
    {

        $about = About::first();
        $about->setTranslation('title1', 'en', $request->title1_en);
        $about->setTranslation('title2', 'en', $request->title2_en);
        $about->setTranslation('content', 'en', $request->content_en);
        $about->setTranslation('title1', 'ka', $request->title1_ka);
        $about->setTranslation('title2', 'ka', $request->title2_ka);
        $about->setTranslation('content', 'ka', $request->content_ka);
        $about->update();

        return back();
    }

    public function aboutStatus(Request $request)
    {

        $about = About::first();

//        dd($request->has('status'));

        if ($request->has('status')) {

            $about->active = 1;
        } else {

            $about->active = 0;
        }
        $about->save();

        return back();

    }


    public function aboutphoto(Request $request)
    {
        $about = About::with('media')->first();

        foreach ($about->media as $old) {
            $old->delete();
        }
        if ($request->has('main_img')) {


            // Decode the base64 image data
            $decodedImageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->main_img));

            // Generate a unique filename for the converted image
            $filename = 'converted_image_'.time().'.webp';

            // Store the image data using Laravel's storage system
            Storage::disk('public')->put($filename, $decodedImageData);

            // Add the converted image to the media library
            $about->addMedia(storage_path('app/public/'.$filename))
                ->toMediaCollection('about_main_img');

            // Delete the temporary file
            Storage::disk('public')->delete($filename);

        }

        if ($request->has('secondary_img')) {

            // Decode the base64 image data
            $decodedImageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->secondary_img));

            // Generate a unique filename for the converted image
            $filename = 'converted_image_'.time().'.webp';

            // Store the image data using Laravel's storage system
            Storage::disk('public')->put($filename, $decodedImageData);

            // Add the converted image to the media library
            $about->addMedia(storage_path('app/public/'.$filename))
                ->toMediaCollection('about_secondary_img');

            // Delete the temporary file
            Storage::disk('public')->delete($filename);

        }

        return back();

    }

    public function aboutphotoupdate(Request $request)
    {



    }


    public function terms(Request $request)
    {

        $locales  = Language::all()->toArray();
        $delivery = Delivery::with('prices')->first();
        $terms    = Term::all();

        return view('admin.pages.terms', compact('delivery', 'locales', 'terms'));

    }
}

