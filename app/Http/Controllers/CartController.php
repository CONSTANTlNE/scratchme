<?php
//
//namespace App\Http\Controllers;
//
//use App\Models\Cart;
//use App\Models\Language;
//use Illuminate\Http\Request;
//
//class CartController extends Controller
//{
//    public function index()
//    {
//
//        $carts = Cart::where('user_id', auth()->user()->id)->with('product.prices','product.media')->get();
//
//        $locales = Language::all()->toArray();
//
//
//        return view('pages.cart', compact('locales', 'carts'));
//    }
//
//
//    public function addItem(Request $request)
//    {
//
//
//        $carts = Cart::where('product_id', $request->product_id)->where('user_id', auth()->user()->id)->get();
////dd($carts);
//        if (count($carts) > 0) {
//            $carts[0]->quantity = $carts[0]->quantity + 1;
//            $carts[0]->update();
//            return back();
//        } else {
//            $cart             = new Cart();
//            $cart->product_id = $request->product_id;
//            $cart->user_id    = auth()->user()->id;
//            $cart->quantity   = $request->quantity;
//            $cart->save();
//        }
//
//
//        return back();
//
//    }
//
//
//    public function removeItem(Request $request)
//    {
//
//        $carts = Cart::where('product_id', $request->product_id)->where('user_id', auth()->user()->id)->get();
//        if (count($carts) > 0) {
//            $carts[0]->quantity = $carts[0]->quantity-1;
//            $carts[0]->update();
//            return back();
//        }
//
//        return back();
//
//    }
//
//    public function deleteItem(Request $request){
//
//        Cart::where('id', $request->id)->where('user_id', auth()->user()->id)->delete();
//
//        return back();
//    }
//}
