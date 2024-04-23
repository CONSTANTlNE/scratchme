@extends('admin.layout')

@php

    //dd($products);
@endphp
@section('discounts')

    <div class="box">
        <div class="box-body">
            <div class="grid grid-cols-12 sm:gap-6">
                <div class="xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                    <form action="{{route('createDiscount')}}" method="POST">
                        @csrf
                        <p class="mb-2 text-muted">Discount %</p>
                        <input type="text" name="discount" class="form-control">
                        <button  class="ti-btn ti-btn-light ti-btn-wave mt-3">Create</button>
                    </form>
                </div>
                <div class="xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                    <form action="{{route('createCoupon')}}" method="POST">
                        @csrf
                        <p class="mb-2 text-muted">Coupon Code</p>
                        <input type="text" name="coupon" class="form-control">
                        <p class="mb-2 text-muted">Discount %</p>
                        <input type="text" name="discount" class="form-control">
                        <p class="mb-2 text-muted">Expiry Date</p>
                        <input type="date" name="expiry" class="form-control">
                        <button  class="ti-btn ti-btn-light ti-btn-wave mt-3">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-3">
        <div class="col-span-12">
            <div class="box">
                <div class="box-header">
                    <h5 class="box-title">General Discounts</h5>
                </div>
                <div class="box-body">
                    <div class="overflow-auto">
                        <table id="products-table" class="display text-center"
                               style="width:100%">
                            <thead>
                            <tr>
                                <th style="border:1px solid black ;text-align: center">Discount %</th>
                                <th style="border:1px solid black ;text-align: center">Status</th>
                                <th style="border:1px solid black ;text-align: center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($generalDiscounts as $index => $genDiscount)
                                <tr>
                                    <td style="text-align: center">{{$genDiscount->discount}}</td>
                                    <td>
                                        <form action="{{route('discountStatus')}}" method="post"
                                              class="gendiscountForm">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$genDiscount->id}}">

                                            <input type="checkbox" id="hs-basic-with-description-checked{{$index}}"
                                                   class="ti-switch activeGenDiscount"
                                                   @if($genDiscount->active===1) checked="" @endif>

                                        </form>
                                    </td>
                                    <td>
                                        <a style="color:red" href="javascript:void(0);" class=" "
                                           data-hs-overlay="#discountDelete{{$index}}">
                                            <span class="material-symbols-outlined">delete</span>
                                        </a>
                                        <div id="discountDelete{{$index}}"
                                             class="hs-overlay hidden ti-modal  [--overlay-backdrop:static]">
                                            <div class="hs-overlay-open:mt-7 ti-modal-box mt-0 ease-out">
                                                <div class="ti-modal-content">
                                                    <div class="ti-modal-header">
                                                        <h6 class="modal-title text-[1rem] font-semibold"></h6>
                                                        <button type="button"
                                                                class="hs-dropdown-toggle !text-[1rem] !font-semibold !text-defaulttextcolor"
                                                                data-hs-overlay="#discountDelete">
                                                            <span class="sr-only">Close</span>
                                                            <i class="ri-close-line"></i>
                                                        </button>
                                                    </div>
                                                    <div class="ti-modal-body px-4">
                                                        <h6 class="modal-title text-[1rem] font-semibold">არ იუ
                                                            შუა?
                                                        </h6>
                                                    </div>
                                                    <div class="ti-modal-footer">
                                                        <button type="button"
                                                                class="hs-dropdown-toggle ti-btn  ti-btn-secondary-full align-middle"
                                                                data-hs-overlay="#discountDelete{{$index}}">
                                                            Close
                                                        </button>
                                                        @if(isset($genDiscount))
                                                        <form action="{{route('deleteDiscount')}}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="generalDiscount" value="{{$genDiscount->id}}">
                                                            <button class="ti-btn bg-primary text-white !font-medium">
                                                                წაშალე მაგის დედაც
                                                            </button>
                                                        </form>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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

    <div class="grid grid-cols-12 gap-6 mt-3">
        <div class="col-span-12">
            <div class="box">
                <div class="box-header">
                    <h5 class="box-title">Coupon Discounts</h5>
                </div>
                <div class="box-body">
                    <div class="overflow-auto">
                        <table id="coupon-table" class="display text-center"
                               style="width:100%">
                            <thead>
                            <tr>
                                <th style="border:1px solid black ;text-align: center">Name</th>
                                <th style="border:1px solid black ;text-align: center">Discount %</th>
                                <th style="border:1px solid black ;text-align: center">Valid Till</th>
                                <th style="border:1px solid black ;text-align: center">Status</th>
                                <th style="border:1px solid black ;text-align: center">Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($couponDiscounts as $index => $couponDiscount)
                                <tr>
                                    <td>{{$couponDiscount->coupon_code}}</td>
                                    <td style="text-align: center">{{$couponDiscount->discount}}</td>
                                    <td style="text-align: center">{{$couponDiscount->expiry_date}}</td>
                                    <td>
                                        <form action="{{route('discountStatus')}}" method="post"
                                              class="couponDiscountForm">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$couponDiscount->id}}">
                                            <input type="checkbox" id="hs-basic-with-description-checked{{$index}}"
                                                   class="ti-switch activeCouponDiscount"
                                                   @if($couponDiscount->active===1) checked="" @endif>
                                        </form>
                                    </td>
                                    <td>
                                        @if(isset($couponDiscount))
                                        <a style="color:red" href="javascript:void(0);" class=" "
                                           data-hs-overlay="#productDelete{{$index}}">
                                            <span class="material-symbols-outlined">delete</span>
                                        </a>
                                        <div id="productDelete{{$index}}"
                                             class="hs-overlay hidden ti-modal  [--overlay-backdrop:static]">
                                            <div class="hs-overlay-open:mt-7 ti-modal-box mt-0 ease-out">
                                                <div class="ti-modal-content">
                                                    <div class="ti-modal-header">
                                                        <h6 class="modal-title text-[1rem] font-semibold"></h6>
                                                        <button type="button"
                                                                class="hs-dropdown-toggle !text-[1rem] !font-semibold !text-defaulttextcolor"
                                                                data-hs-overlay="#productDelete">
                                                            <span class="sr-only">Close</span>
                                                            <i class="ri-close-line"></i>
                                                        </button>
                                                    </div>
                                                    <div class="ti-modal-body px-4">
                                                        <h6 class="modal-title text-[1rem] font-semibold">არ იუ
                                                            შუა?
                                                        </h6>
                                                    </div>
                                                    <div class="ti-modal-footer">
                                                        <button type="button"
                                                                class="hs-dropdown-toggle ti-btn  ti-btn-secondary-full align-middle"
                                                                data-hs-overlay="#productDelete{{$index}}">
                                                            Close
                                                        </button>

                                                        <form action="{{route('deleteDiscount')}}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="couponDiscount" value="{{$couponDiscount->id}}">
                                                            <button class="ti-btn bg-primary text-white !font-medium">
                                                                წაშალე მაგის დედაც
                                                            </button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
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
        </div>
    </div>

@endsection