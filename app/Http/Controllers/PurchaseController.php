<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CouponDiscount;
use App\Models\Language;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    public function checkout(Request $request)
    {
        // აქ გავდივარ ავტორიზაციას


         $validated = $request->validate([
             'address' => 'required',
             'mobile' => 'required',
         ]);




        $order = Order::with([
            'products' => function ($query) {
                $query->with('prices', 'media');
            }
        ])
            ->with('delivery.prices')
            ->where('user_id', auth()->user()->id)
            ->where('paid', 0)
            ->first();

        // if cart is empty
        if($order==null){
            return back();
        }

        $couponDiscounts = CouponDiscount::where('id', $order->coupon_discount_id)->first();

        $quantities = DB::table('order_product')
            ->where('order_id', $order->id)->get();

        $order->address = $validated['address'];
        $order->save();
        $user         = auth()->user();
        $user->mobile = $validated['mobile'];
        $user->save();

        $locales = Language::all()->toArray();

        return view('pages.checkout', compact('locales', 'order', 'quantities', 'couponDiscounts'));

    }


    public function createPayment(Request $request)
    {

//        dd($request->all());

        $order = Order::with([
            'products' => function ($query) {
                $query->with('prices');
            }
        ])
            ->with('delivery.prices')
            ->where('user_id', auth()->user()->id)
            ->where('paid', 0)
            ->first();

        $quantities = DB::table('order_product')
            ->where('order_id', $order->id)->get();



        $amount = 0;


        foreach ($order->products as $product) {
            if ($order->coupon_discount_id !== null) {

                $amount += $product->prices->whereNull('discount')->last()->price * $quantities->where('product_id',
                        $product->id)->first()->quantity;

        } else {
                $amount += $product->prices->last()->price * $quantities->where('product_id',
                        $product->id)->first()->quantity;
            }

        }

        $couponDiscounts = CouponDiscount::where('id', $order->coupon_discount_id)->first();
        if($couponDiscounts){

            $discount=$couponDiscounts->discount/100;
            // Coupon discounted amount
            $totalAmount=$amount*(1-$discount)+$order->delivery->prices->last()->price;
        } else{

            $totalAmount=$amount+$order->delivery->prices->last()->price;
        }


        dd($totalAmount, $order->id);


    }


    public function tbcCallback(Request $request)
    {


    }


}
