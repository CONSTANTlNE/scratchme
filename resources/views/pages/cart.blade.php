@extends('pages.ynex')
@php

    //        dd($couponDiscounts);
@endphp

@section('cart')
    <div style="max-width: 850px;margin:auto">

        <div class="xxl:col-span-6 col-span-12">
            <div class="box" id="cart-container-delete">
                <div style="justify-content: center!important" class="box-header justify-center text-center">
                    <a style="margin: auto!important;" class="ti-btn ti-btn-dark ti-btn-wave text-white"
                       href="{{route('allproduct')}}">
                        {{__('All Products')}}
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

                                    {{__('Action')}}

                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($order->products))

                                @foreach($order->products as $index => $product)
                                    @php
                                        //                          dd(%product)
                                    @endphp
                                    <tr class="border border-inherit border-solid dark:border-defaultborder/10">
                                        <td>
                                            <div class="flex items-center">
                                                <div class="me-3">
                                                <span style="min-height: 100px!important;" class="avatar avatar-xxl bg-light">
                                                    @foreach($product->media as $img)
                                                        @if($loop->first)
                                                        <img src="{{$img->getFullUrl()}}" alt="">
                                                        @endif
                                                    @endforeach
                                                </span>
                                                </div>
                                                <div>
                                                    <div class="mb-1 text-[0.875rem] font-semibold">
                                                        <a href="javascript:void(0);">{{$product->product_name}}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div style="text-align: center" class="price font-semibold text-[0.875rem]">
                                                @if($order->coupon_discount_id!==null)
                                                    {{$product->prices->whereNull('discount')->last()->price}}
                                                @else
                                                    {{$product->prices->last()->price}}
                                                @endif
                                            </div>
                                        </td>
                                        <td class="product-quantity-container">
                                            <div class="input-group border dark:border-defaultborder/10 rounded-md !flex-nowrap">
                                                <form class="removeQtyForm" method="post"
                                                      action="{{ route('removeItem') }}">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                    <button type="submit"
                                                            class="removeQty btn btn-icon btn-light input-group-text flex-grow  !border-0">
                                                        <i class="ri-subtract-line"></i></button>
                                                </form>
                                                <input disabled type="text"
                                                       class="totalQty form-control form-control-sm border-0 text-center !w-[50px] !px-0"
                                                       aria-label="quantity"
                                                       value="{{ $quantities[$index]->quantity }}">

                                                <form class="addQtyForm" method="post" action="{{ route('addItem')}}">
                                                    @csrf
                                                    <input type="hidden" name="product_id"
                                                           value="{{ $product->id }}">
                                                    <button type="submit" id="addQty"
                                                            class="addQty btn-icon btn-light input-group-text flex-grow  !border-0">
                                                        <i class="ri-add-line"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                        <td>
                                            <div style="text-align: center"
                                                 class="totalPrice text-[0.875rem] font-semibold">
                                                @if($order->coupon_discount_id!==null)
                                                    {{$quantities[$index]->quantity * $product->prices->whereNull('discount')->last()->price}}
                                                @else
                                                    {{$quantities[$index]->quantity * $product->prices->last()->price}}
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="flex justify-center items-center">
                                                <div class="hs-tooltip ti-main-tooltip ltr:[--placement:left] rtl:[--placement:right]">
                                                    <form action="{{route('deleteItem')}}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{$product->id}}">
                                                        <button class="hs-tooltip-toggle ti-btn ti-btn-icon bg-danger text-white !font-medium ">
                                                            <i class="ri-delete-bin-line"></i>

                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="box !hidden" id="cart-empty-cart">
                <div class="box-header">
                    <div class="box-title">
                        Empty Cart
                    </div>
                </div>
                <div class="box-body flex items-center justify-center">
                    <div class="cart-empty text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="svg-muted" width="24" height="24"
                             viewBox="0 0 24 24">
                            <path d="M18.6 16.5H8.9c-.9 0-1.6-.6-1.9-1.4L4.8 6.7c0-.1 0-.3.1-.4.1-.1.2-.1.4-.1h17.1c.1 0 .3.1.4.2.1.1.1.3.1.4L20.5 15c-.2.8-1 1.5-1.9 1.5zM5.9 7.1 8 14.8c.1.4.5.8 1 .8h9.7c.5 0 .9-.3 1-.8l2.1-7.7H5.9z"></path>
                            <path d="M6 10.9 3.7 2.5H1.3v-.9H4c.2 0 .4.1.4.3l2.4 8.7-.8.3zM8.1 18.8 6 11l.9-.3L9 18.5z"></path>
                            <path d="M20.8 20.4h-.9V20c0-.7-.6-1.3-1.3-1.3H8.9c-.7 0-1.3.6-1.3 1.3v.5h-.9V20c0-1.2 1-2.2 2.2-2.2h9.7c1.2 0 2.2 1 2.2 2.2v.4z"></path>
                            <path d="M8.9 22.2c-1.2 0-2.2-1-2.2-2.2s1-2.2 2.2-2.2c1.2 0 2.2 1 2.2 2.2s-1 2.2-2.2 2.2zm0-3.5c-.7 0-1.3.6-1.3 1.3 0 .7.6 1.3 1.3 1.3.8 0 1.3-.6 1.3-1.3 0-.7-.5-1.3-1.3-1.3zM18.6 22.2c-1.2 0-2.2-1-2.2-2.2s1-2.2 2.2-2.2c1.2 0 2.2 1 2.2 2.2s-.9 2.2-2.2 2.2zm0-3.5c-.8 0-1.3.6-1.3 1.3 0 .7.6 1.3 1.3 1.3.7 0 1.3-.6 1.3-1.3 0-.7-.5-1.3-1.3-1.3z"></path>
                        </svg>
                        <h3 class="font-bold mb-1 text-[1.75rem]">Your Cart is Empty</h3>
                        <h5 class="mb-4 text-[1.25rem]">Add some items to make me happy :)</h5>
                        <a href="javascript:void(0);" class="ti-btn bg-primary text-white !font-medium m-4"
                           data-abc="true">continue shopping <i class="bi bi-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
            <div style="max-width: 400px;margin: auto" class="xxl:col-span-3 col-span-12">
                <div class="box">
                    <div class="p-4 border-b border-dashed dark:border-defaultborder/10">
                        <form action="{{route('applyCoupon')}}" method="post">
                            @csrf
                            <div class="input-group">
                                @if(isset($order))
                                    <input type="hidden" name="id" value="{{$order->id}}">
                                @endif
                                <input type="text"
                                       class="form-control form-control-sm !rounded-s-sm  !border-e-0 dark:border-defaultborder/10"
                                       placeholder="Coupon Code" aria-label="coupon-code" name="coupon"
                                       aria-describedby="coupons">

                                <button
                                        class="ti-btn !bg-primary !text-white !font-medium !rounded-s-none !mb-0"
                                        id="coupons">{{__('Apply')}}
                                </button>

                            </div>
                        </form>
                    </div>
                    <div class="p-4 border-b border-dashed dark:border-defaultborder/10">
                        @if(isset($order->products) && $order->coupon_discount_id!==null)
                            <div class="flex items-center justify-between mb-4">
                                <div class="text-[#8c9097] dark:text-white/50 text-[1.25rem] ">{{__('Discount')}}</div>
                                <div class="font-semibold text-[1.25rem] text-success couponDiscount">{{$couponDiscounts->discount}}
                                    %
                                </div>
                            </div>
                        @endif
                        <div class="flex items-center justify-between mb-4">
                            <div class="text-[#8c9097] dark:text-white/50 text-[1.25rem] ">{{__('Delivery')}}</div>
                          <form id="deliveryForm" action="{{route('updateOrderDelivery')}}" method="post">
                              <input type="hidden" name="id" @if(isset($order)) value="{{$order->id}}" @endif>
                              @csrf
                            <select id="delivery" name="delivery" class="font-semibold text-[1rem] text-center">
                                @foreach($deliveries as $index => $delivery)
                                    <option data-price="{{$delivery->prices->last()->price}}" value="{{$delivery->id}}" @if(isset($order) && $delivery->id == $order->delivery_id) selected @endif>{{$delivery->title}}</option>
                                @endforeach
                            </select>
                          </form>

                        </div>
                        <div class="flex items-center justify-between mb-4">
                            <div class="text-[#8c9097] dark:text-white/50 text-[1.25rem] ">{{__('Delivery Charges')}} ₾:</div>
                            <div id="deliveryprice" class="font-semibold text-[1.25rem] text-danger">
                             @if(isset($order))
                                    {{$order->delivery->prices->last()->price}}
                                @endif
                            </div>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="text-[#8c9097] dark:text-white/50 text-[1.25rem] ">{{__('Total')}} ₾:</div>
                            <div id="orderAmount" class=" font-bold text-[1.25rem] text-primary">
                                @php
                                    $total = 0;
                                @endphp
                                @if(isset($order))
                                    @foreach($order->products as $index => $product)
                                        @php
                                            if(isset($couponDiscounts))
                                            {
                                                  $subtotal = $quantities[$index]->quantity * $product->prices->whereNull('discount')->last()->price;
                                                   $total += $subtotal;
                                            }
                                            else{
                                                $subtotal = $quantities[$index]->quantity * $product->prices->last()->price;
                                              $total += $subtotal+($order->delivery->prices->last()->price);
                                            }


                                        @endphp
                                    @endforeach
                                @endif
                                @if(isset($couponDiscounts))
                                     {{$total-($total*($couponDiscounts->discount/100))+$order->delivery->prices->last()->price}}
                                @else
                                    {{$total}}
                                @endif
                            </div>
                        </div>
                    </div>
                    <form action="{{route('checkout')}}" method="post">
                        @csrf
                        <div class="box-body">
                            <div class="flex flex-col justify-center text-center mt-2">
                                <p @error('address')
                                   style="color:  red;font-weight: bolder"
                                   @enderror class="mb-2 text-muted">{{__('Address')}} @error('address') ! @enderror</p>
                                <textarea
                                        @error('address')
                                        style="border: 1px solid red;"
                                        @enderror

                                        style="border-color: black" type="text" name="address"
                                        class="form-control text-center" id="input">@if(isset($order))
                                        {{$order->address}}
                                    @endif</textarea>
                            </div>
                            <div class="flex flex-col justify-center text-center mt-2">
                                <p @error('mobile')
                                   style="color:  red;font-weight: bolder"
                                   @enderror

                                   class="mb-2 text-muted w-9">{{__('Mobile')}} @error('mobile') ! @enderror</p>
                                <input value="{{auth()->user()->mobile}}" name="mobile"
                                       @error('mobile')
                                       style="border: 1px solid red;width: 150px!important;margin:auto"
                                       @enderror
                                       style="border-color: black;width: 150px!important;margin:auto" type="text"
                                       class="form-control text-center" id="input">
                            </div>
                        </div>
                        <div style="padding-bottom: 0!important;" class="p-4 grid">
                            <button class="ti-btn bg-primary  text-white !font-medium !mb-2">
                                {{__('Proceed To Checkout')}}
                            </button>
                        </div>
                    </form>
{{--                    <div class="p-4 grid">--}}
{{--                        <a href="products.html" class="ti-btn bg-light  !font-medium">Countinue Shopping</a>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>

    </div>

@endsection