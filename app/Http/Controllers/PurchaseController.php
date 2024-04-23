<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CouponDiscount;
use App\Models\Language;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class PurchaseController extends Controller
{

    private $apiKey = 'tr3j1Cf37IPregEUIJGC3aZWsGrBBdF7';

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




        $clientId     = '7001643';
        $clientSecret = '6qJVyWO2ZqfdXe66';

        $response = Http::withHeaders([
            'Content-Type' => 'application/x-www-form-urlencoded',
            'apikey'       => $this->apiKey
        ])
            ->asForm()
            ->post('https://api.tbcbank.ge/v1/tpay/access-token', [
                'client_id'     => $clientId,
                'client_secret' => $clientSecret
            ]);

        // redirect from landing page purchase
        if ($response) {
            $token = $response->json()['access_token'];
            session(['token' => $token]);
            Cache::put('token', $token, now()->addMinutes(6));

        }

        return view('pages.checkout', compact('locales', 'order', 'quantities', 'couponDiscounts'));

    }


    public function createPayment(Request $request)
    {
//         აქ ვაგზავნი მოთხოვნას თი ბი სი ში

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

        // Total Amount and Order It must be passed to TBC
//        dd($totalAmount, $order->id);

// TBC Request

        $response = Http::withHeaders([
            'Content-Type'  => 'application/json',
            'apikey'        => $this->apiKey,
            'Authorization' => 'Bearer '.session('token'),
        ])
            ->post('https://api.tbcbank.ge/v1/tpay/payments', [
                'amount'    => [
                    'currency' => 'GEL',
                    'total'    => $totalAmount,
                    'subTotal' => 0,
                    'tax'      => 0,
                    'shipping' => 0,
                ],
                'returnurl' => "https://scratchme.ge/ka/orders",
                "callbackUrl"       => "https://scratchme.ge/api/payment_status",
                'extra'             => auth()->user()->id,
                'expirationMinutes' => '5',
                'methods'           => [5],
                'preAuth'           => false,
                'language'          => 'KA',
                'merchantPaymentId' => $order->id,
            ]);

        //   dd($response->json());

        if ($response) {


            Cache::put('payId', $response->json()['payId'], now()->addMinutes(5));

            return redirect($response->json()['links'][1]['uri']);
        }




    }

    public function tbcCallback(Request $request){

        $log = new Logger('name');
        $log->pushHandler(new StreamHandler(storage_path('logs/tbc.log'), Logger::INFO));
        $log->info('Called.');
        $log->info($request->getContent());


        $paymentId = $request->json('PaymentId');
        $response = Http::withHeaders([
            'apikey'        => $this->apiKey,
            'accept'        => 'application/json',
            'Authorization' => 'Bearer '.Cache::get('token'),
        ])->get('https://api.tbcbank.ge/v1/tpay/payments/'.$paymentId);


        $responseJson = $response->json();

        $transactionId = $responseJson['transactionId'];
        $resultCode    = $responseJson['resultCode'];

        $userID         = $responseJson['extra'];
        $orderID = $response->json()['merchantPaymentId'];


        if ($resultCode === 'approved' ){

            $payment=new Payment();
            $payment->order_id=$orderID;
            $payment->comment="TBC Online";
            $payment->amount=$responseJson['amount'];
            $payment->save();

        }


    }



}
