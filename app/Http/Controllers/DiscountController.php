<?php

namespace App\Http\Controllers;

use App\Models\CouponDiscount;
use App\Models\GeneralDiscount;
use App\Models\Language;
use App\Models\Order;
use App\Models\Price;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DiscountController extends Controller
{

    public function index()
    {
        $locales          = Language::all()->toArray();
        $generalDiscounts = GeneralDiscount::all();
        $couponDiscounts  = CouponDiscount::all();

        return view('admin.pages.discounts', compact('locales', 'generalDiscounts', 'couponDiscounts'));
    }

    public function discountStatus(Request $request)
    {

        $couponDiscount = CouponDiscount::find($request->id);
        if ($couponDiscount) {
            if ($couponDiscount->active == 1) {
                $couponDiscount->active = 0;
            } else {
                $couponDiscount->active = 1;
            }
            $couponDiscount->save();
        } else {

            $generalDiscount = GeneralDiscount::find($request->id);
            if ($generalDiscount) {
                if ($generalDiscount->active == 1) {
                    $generalDiscount->active = 0;
                } else {
                    $generalDiscount->active = 1;
                }
                $generalDiscount->save();
            }
        }

        return back();
    }

    public function createDiscount(Request $request)
    {

        $discount           = new GeneralDiscount();
        $discount->discount = $request->discount;
        $discount->active   = 1;
        $discount->save();

        $products = Product::all();


        foreach ($products as $product) {
            $price                  = new Price();
            $price->price           = ($product->prices()->whereNull('discount')->latest()->first()->price * (1 - ($request->discount / 100)));
            $price->product_id      = $product->id;
            $price->discount        = $request->discount;
            $price->discount_active = 1;
            $price->save();


            // თუ არსებობს გადაუხდელი შეკვეთა განვაახლოთ ფასი თუ მოიხსნა ფასდაკლება
            $order = Order::where('user_id', auth()->user()->id)->where('paid', 0)->first();
            if ($order) {
                DB::table('order_product')
                    ->where('product_id', $product->id)
                    ->where('order_id', $order->id)
                    ->update(['price_id' => $price->id]);
            }
        }


        return back();

    }

    public function createCoupon(Request $request)
    {

//        dd($request);

        $discount              = new CouponDiscount();
        $discount->coupon_code = $request->coupon;
        $discount->discount    = $request->discount;
        $discount->active      = 1;
        $discount->expiry_date = $request->expiry;
        $discount->save();

        return back();
    }


    public function deleteDiscount(Request $request)
    {

        if ($request->has('generalDiscount')) {
            $discount = GeneralDiscount::find($request->generalDiscount);

            $products = Product::all();
            foreach ($products as $product) {
                $price             = new Price();
                $price->price      = $product->prices()->whereNull('discount')->latest()->first()->price;
                $price->product_id = $product->id;
                $price->save();

                // თუ არსებობს გადაუხდელი შეკვეთა განვაახლოთ ფასი თუ მოიხსნა ფასდაკლება
                $order = Order::where('user_id', auth()->user()->id)->where('paid', 0)->first();
                if ($order) {
                    DB::table('order_product')
                        ->where('product_id', $product->id)
                        ->where('order_id', $order->id)
                        ->update(['price_id' => $price->id]);
                }
            }
            $discount->delete();
        } else {

            $discount = CouponDiscount::find($request->couponDiscount);
            $discount->delete();
        }


        return back();

    }

}
