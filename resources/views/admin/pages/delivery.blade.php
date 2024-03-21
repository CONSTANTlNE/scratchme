@extends('admin.layout')

@php
    //    dd($deliveries);
@endphp
@section('delivery')

    <div class="grid grid-cols-12 gap-x-6">
        <div class="xxl:col-span-8 xl:col-span-6 lg:col-span-6 md:col-span-6 col-span-12">
            <div class="box">
                <div class="box-header justify-between">
                    <div class="box-title">
                        Add Delivery
                    </div>
                </div>
                <div class="box-body">
                    <form class="grid grid-cols-2 gap-4 items-center" action="{{route('createDelivery')}}"
                          method="post">
                        @csrf
                        <div class="mb-4 sm:mb-0 input-group">
                            <div class="input-group-text">Delivery Name</div>
                            <input type="text" class="form-control"
                                   id="inlineFormInputGroupUsername" name="delivery_name">
                        </div>
                        <div class="mb-4 sm:mb-0 input-group">
                            <div class="input-group-text">Price</div>
                            <input type="text" class="form-control"
                                   id="inlineFormInputGroupUsername" name="delivery_price">
                        </div>

                        <button type="submit" class="ti-btn ti-btn-primary-full !mb-0 ">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-3">
        <div class="col-span-12">
            <div class="box">
                <div class="box-header">
                    <h5 class="box-title">Delivery</h5>
                </div>
                <div class="box-body">
                    <div class="overflow-auto">
                        <table id="orders-table" class="display text-center"
                               style="width:100%">
                            <thead>
                            <tr>
                                <th style="border:1px solid black ;text-align: center">Name</th>
                                <th style="border:1px solid black ;text-align: center">price</th>
                                <th style="border:1px solid black ;text-align: center">Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($deliveries as $delivery)
                            <tr>
                                <td style="text-align: center">
                                    {{$delivery->title}}
                                </td>
                                <td style="text-align: center">
                                    {{$delivery->prices->last()->price}}
                                </td>
                                <td style="text-align: center">
                                    action
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