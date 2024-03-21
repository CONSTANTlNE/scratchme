@extends('pages.ynex')
@php
    //dd($carts);
@endphp

@section('checkout')
    <div style="max-width: 650px;margin:auto">

        <div class="xxl:col-span-6 col-span-12">
            <form action="{{route('createPayment')}}" method="post">
                @csrf
                <input type="hidden" name="order_id" value="{{$order->id}}">
            <div class="box" id="cart-container-delete">
                <div style="justify-content: center!important" class="box-header justify-center text-center">
                    <a style="margin: auto!important;" class="ti-btn ti-btn-dark ti-btn-wave text-white" href="{{route('cart')}}">
                        კორექტირება
                    </a>
                    <a style="margin: auto!important;" class="ti-btn ti-btn-dark ti-btn-wave text-white" href="{{route('allproduct')}}">
                        ყველა პროდუქტი
                    </a>
                </div>

                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered whitespace-nowrap min-w-full">
                            <thead>
                            <tr>
                                <th scope="row" class="text-center">
                                    Product Name
                                </th>
                                <th scope="row" style="text-align: center" class="text-center">
                                    Price
                                </th>
                                <th scope="row" style="text-align: center" class="text-center">
                                    Quantity
                                </th>
                                <th scope="row" style="text-align: center" class="text-center">
                                    Total
                                </th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order->products as $index => $product)

                                <tr class="border border-inherit border-solid dark:border-defaultborder/10">
                                    <td>
                                        <div class="flex items-center">
                                            <div class="me-3">
                                                        <span class="avatar avatar-xxl bg-light">
                                                            @foreach($product->media as $img)
                                                                <img src="{{$img->getFullUrl()}}" alt="">
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
                                        <div style="text-align: center" class="font-semibold text-[0.875rem]">
                                            @if($order->coupon_discount_id!==null)
                                                {{$product->prices->whereNull('discount')->last()->price}}
                                            @else
                                                {{$product->prices->last()->price}}
                                            @endif
                                        </div>
                                    </td>
                                    <td class="product-quantity-container">
                                        <div class="input-group border dark:border-defaultborder/10 rounded-md !flex-nowrap">

                                            <input disabled type="text"
                                                   class="form-control form-control-sm border-0 text-center !w-[50px] !px-0"
                                                   aria-label="quantity" id="product-quantity1"
                                                   value="{{$quantities[$index]->quantity}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div style="text-align: center" class="text-[0.875rem] font-semibold">
                                            @if($order->coupon_discount_id!==null)
                                                {{$quantities[$index]->quantity * $product->prices->whereNull('discount')->last()->price}}
                                            @else
                                                {{$quantities[$index]->quantity * $product->prices->last()->price}}
                                            @endif
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
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
            <div style="max-width: 400px!important;margin:auto" class="xxl:col-span-3 col-span-12">
                <div class="box">
                    <div class="box-body">
                        <div class="p-4 border-b border-dashed dark:border-defaultborder/10">
                            @if(isset($order->products)  && $order->coupon_discount_id!==null)
                                <div class="flex items-center justify-between mb-4">
                                    <div class="text-[#8c9097] dark:text-white/50 text-[1.25rem] ">Discount</div>
                                    <div class="font-semibold text-[1.25rem] text-success couponDiscount">{{$couponDiscounts->discount}}
                                        %
                                    </div>
                                </div>
                            @endif
                            <div class="flex items-center justify-between mb-4">
                                <div  class="text-[#8c9097] dark:text-white/50 text-[1.25rem] ">Delivery Charges</div>
                                <div class="font-semibold text-[1.25rem] text-danger">{{$order->delivery->prices->last()->price}}</div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="text-[#8c9097] dark:text-white/50 text-[1.25rem] ">Total :</div>
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
                                                  $total += $subtotal;
                                                }


                                            @endphp
                                        @endforeach
                                    @endif
                                    @if(isset($couponDiscounts))
                                        {{--                                    @php$total=  $total($couponDiscounts->discount/100); @endphp--}}
                                        ₾: {{$total-($total*($couponDiscounts->discount/100))+$order->delivery->prices->last()->price}}
                                    @else
                                        ₾: {{$total+$order->delivery->prices->last()->price}}
                                    @endif

                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col justify-center text-center mt-2">
                            <p class="mb-2 text-muted">address</p>
                            <textarea disabled   style="border-color: black" type="text" name="address" class="form-control text-center" id="input">{{$order->address}}</textarea>
                        </div>
                        <div class="flex flex-col justify-center text-center mt-2">
                            <p class="mb-2 text-muted w-9">Mobile</p>
                            <input disabled style="border-color: black;width: 150px!important;margin:auto"  type="text" value="{{auth()->user()->mobile}}" class="form-control text-center" id="input">
                        </div>
                    </div>
                    <div  class="p-4 grid text-center" >
                        <script id="tbcCheckoutSdk" type="text/javascript" src="https://ecom.tbcpayments.ge/tbccheckoutbutton/script.min.js?callback=TbcCallBack" defer></script>
                        <script>
                            TbcCallBack = function() {TbcCheckout.Render({ type: 'large', color: 'blue' });
                                document.getElementById('tbcCheckoutButton').addEventListener('click', redirectTbcCheckout)};
                        </script>
                        <TbcCheckout style="margin: auto"></TbcCheckout>

                        <button class="mt-2 m-auto">
                            <img style="width: 280px" src="{{asset('landing_assets/img/bog.svg')}}" alt="">
                        </button>

                    </div>
                </div>
            </div>
            </form>
        </div>

    </div>

@endsection