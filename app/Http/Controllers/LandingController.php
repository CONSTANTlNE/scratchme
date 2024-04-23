<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Faq;
use App\Models\Language;
use App\Models\Order;
use App\Models\Product;
use App\Models\Term;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class LandingController extends Controller
{

    public function index(Request $request)
    {

        if (auth()->check() === false) {
            $userId = $request->cookie('user_id');

            if (!$userId) {
                // Generate a unique identifier for the user
                $userId = uniqid();

                // Store the identifier in a cookie
                Cookie::queue('user_id', $userId, 60 * 24 * 30); // Expires in 1 year
            }
        }


        $languages = Language::all();
        $products  = Product::with('prices', 'media', 'features')
            ->where('active', 1)
            ->where('for_landing', 1)
            ->orderBy('position', 'asc')
            ->get();

        $faqs = Faq::all();


        if (auth()->check()) {

            $order = Order::where('user_id', auth()->user()->id)
                ->where('paid', 0)
                ->first();
            if ($order) {
                $quantities = DB::table('order_product')
                    ->where('order_id', $order->id)->get();

                return view('index', compact('products', 'languages', 'faqs', 'quantities'));
            }

        }

        return view('index', compact('products', 'languages', 'faqs'));
    }

    public function allProducts()
    {
        $languages = Language::all();
        $products  = Product::with('prices', 'media', 'features')->get();


        if (auth()->check()) {
            $order = Order::
            where('user_id', auth()->user()->id)
                ->where('paid', 0)
                ->first();

            if ($order) {
                $quantities = DB::table('order_product')
                    ->where('order_id', $order->id)->get();

                return view('pages.all-products', compact('products', 'languages', 'quantities'));
            }
        }

        return view('pages.all-products', compact('products', 'languages'));

    }

    public function productDetails(Request $request, $locale, $slug)
    {

        $locales = Language::all()->toArray();
        $product = Product::with('prices', 'media', 'features')
            ->where('active', 1)
            ->where('slug', $slug)
            ->first();

        $allProducts = Product::with('prices', 'media', 'features')->get();

        $languages = Language::all();

        if (auth()->check()) {
            $order = Order::
            where('user_id', auth()->user()->id)
                ->where('paid', 0)
                ->first();
        }
        if (auth()->check() && $order) {

            $quantities = DB::table('order_product')
                ->where('order_id', $order->id)->get();

            return (view('pages.product-details',
                compact('product', 'locales', 'languages', 'quantities', 'allProducts')));
        }

        return (view('pages.product-details', compact('product', 'locales', 'languages', 'allProducts')));
    }

    public function about (){
        $locales = Language::all()->toArray();
        $languages = Language::all();
        $about   = About::with('media')->first();

        if (auth()->check()) {

            $order = Order::where('user_id', auth()->user()->id)
                ->where('paid', 0)
                ->first();
            if ($order) {
                $quantities = DB::table('order_product')
                    ->where('order_id', $order->id)->get();

                return view('pages.about', compact( 'languages','locales', 'quantities','about'));
            }

        }

        return view('pages.about',compact('locales','languages','about'));
    }

    public function terms(){

        $locales = Language::all()->toArray();
        $languages = Language::all();
        $terms = Term::all();

        if (auth()->check()) {

            $order = Order::where('user_id', auth()->user()->id)
                ->where('paid', 0)
                ->first();
            if ($order) {
                $quantities = DB::table('order_product')
                    ->where('order_id', $order->id)->get();

                return view('pages.terms', compact( 'languages','locales', 'quantities','terms'));
            }

        }

        return view('pages.terms',compact('locales','languages','terms'));
    }
}
