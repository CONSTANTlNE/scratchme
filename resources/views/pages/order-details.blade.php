@extends('pages.ynex')
@php

@endphp

@section('checkout')
    <div style="max-width: 650px;margin:auto">

        <div class="xxl:col-span-6 col-span-12">


            <div class="box" id="cart-container-delete">
                <div style="justify-content: center!important" class="box-header justify-center text-center">
                    <a style="margin: auto!important;" class="ti-btn ti-btn-dark ti-btn-wave text-white"
                       href="{{ url()->previous() }}">
                        {{__('Back')}}
                    </a>
                </div>

                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered whitespace-nowrap min-w-full">
                            <thead>
                            <tr>
                                <th scope="row" class="text-center">
                                    {{__('Product Name')}}
                                </th>
                                <th scope="row" style="text-align: center" class="text-center">
                                    {{__('Price')}}
                                </th>
                                <th scope="row" style="text-align: center" class="text-center">
                                    {{__('Quantity')}}
                                </th>
                                <th scope="row" style="text-align: center" class="text-center">
                                    {{__('Total')}}
                                </th>

                                <th scope="row" style="text-align: center" class="text-center">
                                    {{__('Discount')}}
                                </th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orderproduct as $index => $order)
{{--                                @php dd($order->id) @endphp--}}
                                <tr class="border border-inherit border-solid dark:border-defaultborder/10">
                                    <td>
                                        <div class="flex items-center">
                                            <div class="me-3">
                                                        <span class="avatar avatar-xxl bg-light">
                                                            @foreach($order->orderproducts->media as $img)
                                                                @if($loop->first)
                                                                <img src="{{$img->getFullUrl()}}" alt="">
                                                                @endif
                                                            @endforeach
                                                        </span>
                                            </div>
                                            <div>
                                                <div class="mb-1 text-[0.875rem] font-semibold">
                                                    <a href="javascript:void(0);">{{$order->orderproducts->product_name}}</a>
                                                </div>

                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div style="text-align: center" class="font-semibold text-[0.875rem]">
{{--                                            @php dd($order->prices->price) @endphp--}}
                                            @if($order->order->coupon_discount_id!==null)
                                                {{$order->prices->price}}
                                            @else
                                                {{$order->prices->price}}
                                            @endif
                                        </div>
                                    </td>
                                    <td class="product-quantity-container">
                                        <div class="input-group border dark:border-defaultborder/10 rounded-md !flex-nowrap">

                                            <input disabled type="text"
                                                   class="form-control form-control-sm border-0 text-center !w-[50px] !px-0"
                                                   aria-label="quantity" id="product-quantity1"
                                                   value="{{$order->quantity}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div style="text-align: center" class="text-[0.875rem] font-semibold">
                                            @if($order->order->coupon_discount_id!==null)
                                                {{$order->quantity * $order->prices->price}}
                                            @else
                                                {{$order->quantity * $order->prices->price}}
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        @if($order->prices->discount!==null && $order->order->coupon_discount_id===null)
                                            <div style="text-align: center" class="text-[0.875rem] font-semibold">
                                                {{$order->prices->discount}}%
                                            </div>
                                        @elseif($order->order->coupon_discount_id!==null)
                                            <div style="text-align: center" class="text-[0.875rem] font-semibold">

                                                {{$order->order->couponDiscount->discount}}%
                                            </div>
                                            <div style="text-align: center" class="text-[0.875rem] font-semibold">

                                                {{$order->order->couponDiscount->coupon_code}}
                                            </div>

                                            @else
                                            <div style="text-align: center" class="text-[0.875rem] font-semibold">
                                                N/A
                                            </div>

                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div style="max-width: 400px!important;margin:auto" class="xxl:col-span-3 col-span-12">
                <div class="box">
                    <div class="box-body">
                        <div class="p-4 border-b border-dashed dark:border-defaultborder/10">
                            @if(isset($order->products)  && $order->coupon_discount_id!==null)
                                <div class="flex items-center justify-between mb-4">
                                    <div class="text-[#8c9097] dark:text-white/50 text-[1.25rem] ">{{__('Discount')}}</div>
                                    <div class="font-semibold text-[1.25rem] text-success couponDiscount">{{$couponDiscounts->discount}}
                                        %
                                    </div>
                                </div>
                            @endif
                            <div class="flex items-center justify-between mb-4">
                                <div class="text-[#8c9097] dark:text-white/50 text-[1.25rem] ">{{__('Delivery Charges')}}</div>
                                <div class="font-semibold text-[1.25rem] text-danger">{{$order->order->delivery->prices->last()->price}}</div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="text-[#8c9097] dark:text-white/50 text-[1.25rem] ">{{__('Total')}} :</div>
                                <div id="orderAmount" class=" font-bold text-[1.25rem] text-primary">
                                    @php
                                        $total = 0;
                                    @endphp
                                    @if($order->order->coupon_discount_id===null)
                                        @foreach($orderproduct as $index => $order)
                                            @php
                                                $subtotal = $order->quantity * $order->prices->price;
                                              $total += $subtotal;
                                            @endphp
                                            {{$total+$order->order->delivery->prices->last()->price}}
                                        @endforeach
                                    @else
                                        @foreach($orderproduct as $index => $order)
                                            @php
                                                $subtotal = $order->quantity * $order->orderproducts->prices->whereNull('discount')->last()->price;
                                              $total += $subtotal;
                                            @endphp
                                           {{$total*(1-$order->order->couponDiscount->discount/100) +$order->order->delivery->prices->last()->price}}
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col justify-center text-center mt-2">
                            <p class="mb-2 text-muted">{{__('Address')}}</p>
                            <textarea disabled style="border-color: black" type="text" name="address"
                                      class="form-control text-center" id="input">{{$order->order->address}}</textarea>
                        </div>
                        <div class="flex flex-col justify-center text-center mt-2">
                            <p class="mb-2 text-muted w-9">{{__('Mobile')}}</p>
                            <input disabled style="border-color: black;width: 150px!important;margin:auto" type="text"
                                   value="{{$order->order->user->mobile}}" class="form-control text-center" id="input">
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>

@endsection