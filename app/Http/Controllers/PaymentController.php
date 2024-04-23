<?php

namespace App\Http\Controllers;


use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function manualPayment(Request $request){

//        dd($request->all());
        $payment = new Payment();
        $payment->amount = $request->input('amount');
        $payment->order_id = $request->input('order_id');
        $payment->comment = $request->input('comment');
        $payment->save();

        $order = Order::find($request->input('order_id'));
        $order->paid = 1;
        $order->save();

        return back();

    }
}
