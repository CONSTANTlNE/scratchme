<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CouponDiscount;
use App\Models\Delivery;
use App\Models\Faq;
use App\Models\Language;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Price;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderController extends Controller
{

    public function index()
    {

//        $gg=OrderProduct::with('prices','orderproducts')->get();
//        dd($gg);
        $locales    = Language::all()->toArray();
        $deliveries = Delivery::with('prices')->get();

        $order = Order::with([
            'products' => function ($query) {
                $query->with('prices', 'media',);
            }
        ])->with('delivery.prices')
            ->where('user_id', auth()->user()->id)
            ->where('paid', 0)
            ->first();


        if ($order) {
            $quantities      = DB::table('order_product')
                ->where('order_id', $order->id)->get();
            $couponDiscounts = CouponDiscount::where('id', $order->coupon_discount_id)->first();

            return view('pages.cart', compact('locales', 'order', 'quantities', 'couponDiscounts', 'deliveries'));
        } else {
            return view('pages.cart', compact('locales', 'order', 'deliveries'));
        }
    }


    public function addItem(Request $request)
    {

        if(!auth()->check()){
            return redirect('login');
        }

        $locales = Language::all()->toArray();
// dd($request->product_id);
        $order = Order::with('products')
            ->where('user_id', auth()->user()->id)
            ->where('paid', 0)
            ->first();

        if ($order) {
            // Check if the product already exists in the order
            $existingProduct = $order->products()->find($request->product_id);

            if ($existingProduct) {
                DB::table('order_product')
                    ->where('product_id', $request->product_id)
                    ->where('order_id', $order->id)
                    ->increment('quantity');

                return back()->with('locales', $locales);
            } else {
                // If the product does not exist, add it to the order with quantity 1

                $order->products()->attach($request->product_id, [
                    'quantity'   => 1,
                    'user_id'    => auth()->user()->id,
                    'order_id'   => $order->id,
                    'price_id'   => $request->price_id,
                    'created_at' => now(),

                ]);

                return back()->with('locales', $locales);
            }
        } else {

            $delivery     = Delivery::first();
            $newOrder     = new Order();
            $rand1        = Str::upper(Str::random(3, 'abcdefghijklmnopqrstuvwxyz'));
            $rand         = random_int(156, 999);
            $order_number = $rand1.'-'.$rand;
            while (Order::where('order_number', $order_number)->exists()) {
                $rand1        = Str::upper(Str::random(3, 'abcdefghijklmnopqrstuvwxyz'));
                $rand         = random_int(156, 999);
                $order_number = $rand1.'-'.$rand;
            }
            $newOrder->order_number = $order_number;
            $newOrder->user_id      = auth()->user()->id;
            $newOrder->delivery_id  = $delivery->id;
            $newOrder->save();
//            Order and Product have many to many relationship
            $newOrder->products()->attach($request->product_id,
                [
                    'quantity' => 1,
                    'order_id' => $newOrder->id,
                    'user_id'  => auth()->user()->id,
                    'price_id' => $request->price_id,

                ]);

            return back()->with('locales', $locales);
        }


    }


    public function removeItem(Request $request)
    {

        $order = Order::with('products')
            ->where('user_id', auth()->user()->id)
            ->where('paid', 0)
            ->first();

        $quantity = DB::table('order_product')
            ->where('product_id', $request->product_id)
            ->where('order_id', $order->id)->first();


        if ($quantity->quantity > 1) {
            DB::table('order_product')
                ->where('product_id', $request->product_id)
                ->where('order_id', $order->id)
                ->decrement('quantity');
        }


        return back();


    }


    public function deleteItem(Request $request)
    {
//    dd($request->product_id);
        $order = Order::with('products')
            ->with('pivot')
            ->where('user_id', auth()->user()->id)
            ->where('paid', 0)
            ->first();

        // თუ ერთი პროდუტქია კალათაში და წაშალა მაშინ მთლიანი შეკვეთა იშლება
        if ($order->products->count() === 1) {
            $order->delete();

            return redirect()->route('index');
        }

        DB::table('order_product')
            ->where('product_id', $request->id)
            ->where('order_id', $order->id)
            ->delete();

        return back();

    }


    public function applyCoupon(Request $request)
    {
//       dd($request);
        $couponDiscount = CouponDiscount::where('coupon_code', $request->coupon)->first();
//               dd($couponDiscount);


        $order = Order::with('products')
            ->where('user_id', auth()->user()->id)
            ->where('paid', 0)->first();
        $order->couponDiscount()->associate($couponDiscount);
        $order->save();

        foreach ($order->products as $index => $product) {
            $priceID = Price::whereNull('discount')->where('product_id', $product->id)->get();
            DB::table('order_product')
                ->where('order_id', $order->id)
                ->where('product_id', $product->id)
                ->update(['price_id' => $priceID[0]->id]);
        }

        return back();

    }

    public function updateOrderDelivery(Request $request)
    {


        $order = Order::where('user_id', auth()->user()->id)->where('id', $request->id)->first();
//        dd($order);
        if ($order === null) {
            return back();
        }
        $order->delivery_id = $request->delivery;
        $order->save();

        return back();

    }

    public function userOrders(Request $request)
    {

        $languages = Language::all();
        $products  = Product::with('prices', 'media', 'features')
            ->where('active', 1)
            ->where('for_landing', 1)
            ->orderBy('position', 'asc')
            ->get();

        $faqs = Faq::all();

        $OrderProduct=OrderProduct::with('prices','order.couponDiscount')->get();
        $orders=Order::where('user_id',auth()->user()->id)
            ->where('paid',1)
            ->with('products','couponDiscount','user','delivery.prices','payment')
            ->get();

//        dd($OrderProduct);

        $order = Order::with([
            'products' => function ($query) {
                $query->with('prices', 'media',);
            }
        ])->with('delivery.prices')
            ->where('user_id', auth()->user()->id)
            ->where('paid', 0)
            ->first();


        if ($order) {
            $quantities      = DB::table('order_product')
                ->where('order_id', $order->id)->get();
            return view('pages.user-orders', compact('orders','languages','products','faqs','OrderProduct','quantities'));
        }
        return view('pages.user-orders', compact('orders','languages','products','faqs','OrderProduct'));
    }


    public function orderDetails(Request $request,$locale,$orderID){

        $orderproduct=OrderProduct::where('order_id',$orderID)
            ->where('user_id',auth()->user()->id)
            ->with('prices','orderproducts.prices','order.couponDiscount')
            ->get();
        $locales = Language::all()->toArray();
        return view('pages.order-details', compact('locales', 'orderproduct',));

    }

}



