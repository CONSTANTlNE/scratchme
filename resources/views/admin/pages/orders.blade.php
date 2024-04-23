@extends('admin.layout')

@php
    //dd($ordersWithQuantities);
@endphp
@section('admin-orders')

    <div class="grid grid-cols-12 gap-6 mt-3">
        <div class="col-span-12">
            <div class="box">
                <div class="box-header">
                    <h5 class="box-title">All Orders</h5>
                </div>
                <div class="box-body">
                    <div class="overflow-auto">
                        <table id="orders-table" class="display text-center"
                               style="width:100%">
                            <thead>

                            <tr>
                                <th style="border:1px solid black ;text-align: center">Date</th>
                                <th style="border:1px solid black ;text-align: center">Paid</th>
                                <th style="border:1px solid black ;text-align: center">Delivered</th>
                                <th style="border:1px solid black ;text-align: center">Order Amount</th>
                                <th style="border:1px solid black ;text-align: center">Customer Name</th>
                                <th style="border:1px solid black ;text-align: center">Customer Email</th>
                                <th style="border:1px solid black ;text-align: center">Customer Mobile</th>
                                <th style="border:1px solid black ;text-align: center">Region</th>
                                <th style="border:1px solid black ;text-align: center">Delivery Address</th>
                                <th style="border:1px solid black ;text-align: center">Coupon</th>
                                <th style="border:1px solid black ;text-align: center">Details</th>
                                <th style="border:1px solid black ;text-align: center">Make payment</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $index => $order)

                                <tr>
                                    <td style="text-align: center">
                                        {{$order->created_at}}
                                    </td>
                                    <td style="text-align: center">
                                        @if($order->paid == 0)
                                            <p style="color: red">Cart created</p>
                                        @else
                                            <p style="color: green">Paid</p>
                                            {{$order->payment->created_at}}
                                        @endif
                                    </td>
                                    <td style="text-align: center">

                                    </td>
                                    <td class="total{{$index}}" style="text-align: center">
                                        @php $total=0 @endphp
                                        @if($order->couponDiscount === null)
                                            @foreach($OrderProduct as $index => $item)
                                                {{-- @php dd($item) @endphp--}}
                                                @if($item->order_id === $order->id )
                                                    {{$total=$item->quantity*$item->prices->price+$order->delivery->prices->last()->price}}
                                                @endif
                                            @endforeach
                                        @else
                                            @foreach($OrderProduct as $item)
                                            {{$total=$item->quantity*$item->prices->price*(1-$order->couponDiscount->discount/100)+$order->delivery->prices->last()->price}}
                                            @endforeach
                                        @endif
                                    </td>
                                    <td style="text-align: center">
                                        {{$order->user->name}}
                                    </td>
                                    <td style="text-align: center">
                                        {{$order->user->email}}
                                    </td>
                                    <td style="text-align: center">
                                        {{$order->user->mobile}}
                                    </td>
                                    <td style="text-align: center">
                                        {{$order->delivery->title}}
                                    </td>
                                    <td style="text-align: center">
                                        {{$order->address}}
                                    </td>
                                    <td style="text-align: center">
                                        @if($order->couponDiscount != null)
                                            {{$order->couponDiscount->coupon_code}}
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td style="text-align: center">
                                        <a target="_blank"
                                           href="{{route('singleOrder',['order'=>$order->id,'user'=>$order->user->id])}}">Details</a>

                                    </td>
                                    <td style="text-align: center">
                                        <form action="{{route('manualPayment')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="order_id" value="{{$order->id}}">
                                            <input type="hidden" name="amount" value="{{$total}}">
                                            <input type="submit" value="Payment">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection