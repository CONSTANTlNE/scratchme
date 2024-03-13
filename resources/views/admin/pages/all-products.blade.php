@extends('admin.layout')

@php

    //dd($products);
@endphp
@section('all-products')
    <div class="grid grid-cols-12 gap-6 mt-3">
        <div class="col-span-12">
            <div class="box">
                <div class="box-header">
                    <h5 class="box-title">All Products</h5>
                </div>
                <div class="box-body">
                    <div class="overflow-auto">
                        {{--                        <div id="basic-table" class="ti-custom-table ti-striped-table ti-custom-table-hover">--}}
                        <table id="products-table" class="display text-center"
                               style="width:100%">
                            <thead>
                            <tr>
                                <th style="border:1px solid black ;text-align: center">Name</th>
                                <th style="border:1px solid black ;text-align: center">Image</th>
                                <th style="border:1px solid black ;text-align: center">Features</th>
                                <th style="border:1px solid black ;text-align: center">Short Description</th>
                                <th style="border:1px solid black ;text-align: center">Long Description</th>
                                <th style="border:1px solid black ;text-align: center">Price</th>
                                <th style="border:1px solid black ;text-align: center">Status</th>
                                <th style="border:1px solid black ;text-align: center">For Landing</th>
                                <th style="border:1px solid black ;text-align: center">Position</th>
                                <th style="border:1px solid black ;text-align: center">Promotion</th>
                                <th style="border:1px solid black ;text-align: center">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $index => $product)
                                <tr>
                                    <td style="border:1px solid black ;text-align: center">{{$product->product_name}}</td>
                                    @foreach($product->media as $img)
                                        <td style="border:1px solid black ;text-align: center">
                                            <img style="height: 180px;width: 100%;min-width: 130px"
                                                 src="{{$img->getUrl()}}">
                                        </td>
                                    @endforeach
                                    <td style="border:1px solid black ;text-align: center">
                                        @foreach($product->features as $feature)
                                            {{--                                            @php dd($feature->feature) @endphp--}}
                                            <p>{{$feature->feature}}</p>
                                        @endforeach
                                        <a href="javascript:void(0);" class="ti-btn ti-btn-light ti-btn-wave"
                                           data-hs-overlay="#productFeatureEdit{{$index}}">Change
                                        </a>
                                        <div id="productFeatureEdit{{$index}}"
                                             class="hs-overlay hidden ti-modal  [--overlay-backdrop:static]">
                                            <div class="hs-overlay-open:mt-7 ti-modal-box mt-0 ease-out">
                                                <form action="{{route('updateFeatures')}}" method="post">
                                                    @csrf
                                                    <div class="ti-modal-content">
                                                        <div class="ti-modal-header">
                                                            <h6 class="modal-title text-[1rem] font-semibold">Edit
                                                                Features</h6>
                                                            <button type="button"
                                                                    class="hs-dropdown-toggle !text-[1rem] !font-semibold !text-defaulttextcolor"
                                                                    data-hs-overlay="#staticBackdrop">
                                                                <span class="sr-only">Close</span>
                                                                <i class="ri-close-line"></i>
                                                            </button>
                                                        </div>
                                                        <div class="ti-modal-body px-4">
                                                            <template class="features-template">
                                                                <div class="flex justify-center align-middle mt-2">
                                                                    <input style="display: inline" type="text"
                                                                           class="form-control" id="feature"
                                                                           placeholder="Default Radius"
                                                                           name="feature[]">
                                                                    <span style="color:red;margin-left: 5px;cursor: pointer;padding-top:10px"
                                                                          class="removeButton material-symbols-outlined">remove</span>
                                                                </div>
                                                            </template>
                                                            <div class="xl:col-span-12 col-span-12 myDiv">
                                                                <input type="hidden" name="id"
                                                                       value="{{$product->id}}">
                                                                @foreach($product->features as $feature)
                                                                    <div class="deleteFeature flex justify-center align-middle mt-2">
                                                                        <textarea class="form-control"
                                                                                  name="feature{{$feature->id}}[]">{{$feature->feature}}</textarea>
                                                                        <span style="color:red;margin-left: 5px;cursor: pointer;padding-top:15px"
                                                                              class="deleteFeatureButton material-symbols-outlined">remove</span>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                            <div class="flex align-middle gap-2 justify-center mt-3">
                                                                <p style="display: inline;padding-top:2px">Add
                                                                    Feature</p>
                                                                <span
                                                                        style="color:green;cursor:pointer;"
                                                                        class="featuresButton material-symbols-outlined">add</span>
                                                            </div>
                                                        </div>
                                                        <div class="ti-modal-footer">
                                                            <button type="button"
                                                                    class="hs-dropdown-toggle ti-btn  ti-btn-secondary-full align-middle"
                                                                    data-hs-overlay="#productFeatureEdit{{$index}}">
                                                                Close
                                                            </button>
                                                            <button
                                                                    class="ti-btn bg-primary text-white !font-medium">
                                                                save
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="border:1px solid black ;text-align: center">{{$product->product_short_description}}</td>
                                    <td style="border:1px solid black ;text-align: center">{{$product->product_long_description}}</td>
                                    <td style="border:1px solid black ;text-align: center">
                                        <p class="mb-2">{{ $product->prices->last()->price }}</p>
                                        <a href="javascript:void(0);" class="ti-btn ti-btn-light ti-btn-wave "
                                           data-hs-overlay="#staticBackdrop{{$index}}">Change
                                        </a>
                                        <div id="staticBackdrop{{$index}}"
                                             class="hs-overlay hidden ti-modal  [--overlay-backdrop:static]">
                                            <div class="hs-overlay-open:mt-7 ti-modal-box mt-0 ease-out">
                                                <form action="{{route('priceUpdate')}}" method="post">
                                                    @csrf
                                                    <div style="max-width: 250px" class="ti-modal-content ">
                                                        <div style="max-width: 100px!important"
                                                             class="ti-modal-body px-4 m-auto">
                                                            <input type="hidden" name="id"
                                                                   value="{{$product->id}}">
                                                            <input class="form-control" name="newprice" type="text">
                                                        </div>
                                                        <div style="display: flex!important;justify-content: center!important;"
                                                             class="ti-modal-footer ">
                                                            <button type="button"
                                                                    class="hs-dropdown-toggle ti-btn  ti-btn-secondary-full align-middle"
                                                                    data-hs-overlay="#staticBackdrop{{$index}}">
                                                                Close
                                                            </button>
                                                            <button class="ti-btn bg-primary text-white !font-medium">
                                                                change
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="border:1px solid black ;text-align: center">
                                        <form action="{{route('changeProductStatus')}}" method="post"
                                              class="productStatusForm">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$product->id}}">
                                            <input type="checkbox" id="hs-basic-with-description-checked{{$index}}"
                                                   class="ti-switch activeProducts"
                                                   @if($product->active===1) checked="" @endif>
                                        </form>
                                    <td style="border:1px solid black ;text-align: center">
                                        <form action="{{route('forLandingUpdate')}}" method="post"
                                              class="forLandingForm">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$product->id}}">
                                            <input class="form-check-input ms-2 forLandingInput" type="checkbox"
                                                   name="for_landing" @if($product->for_landing===1)  checked="" @endif>
                                        </form>
                                    </td>
                                    <td style="border:1px solid black ;text-align: center">
                                        @if($product->position == 100)
                                            <p class="mb-2">{{'N/A'}}</p>
                                        @else
                                            <p class="mb-2">{{$product->position}}</p>
                                        @endif
                                        <a href="javascript:void(0);" class="ti-btn ti-btn-light ti-btn-wave "
                                           data-hs-overlay="#staticBackdrop{{$index}}">Change
                                        </a>
                                        <div id="staticBackdrop{{$index}}"
                                             class="hs-overlay hidden ti-modal  [--overlay-backdrop:static]">
                                            <div class="hs-overlay-open:mt-7 ti-modal-box mt-0 ease-out">
                                                <form action="{{route('changeProductPosition')}}" method="post">
                                                    @csrf
                                                    <div style="max-width: 250px" class="ti-modal-content ">
                                                        <div style="max-width: 100px!important"
                                                             class="ti-modal-body px-4 m-auto">
                                                            <input type="hidden" name="id"
                                                                   value="{{$product->id}}">
                                                            <input class="form-control" name="position" type="text">
                                                        </div>
                                                        <div style="display: flex!important;justify-content: center!important;"
                                                             class="ti-modal-footer ">
                                                            <button type="button"
                                                                    class="hs-dropdown-toggle ti-btn  ti-btn-secondary-full align-middle"
                                                                    data-hs-overlay="#staticBackdrop{{$index}}">
                                                                Close
                                                            </button>
                                                            <button class="ti-btn bg-primary text-white !font-medium">
                                                                change
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="border:1px solid black ;text-align: center">{{$product->promotion}}</td>
                                    <td style="border:1px solid black ;text-align: center">

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
                                                                data-hs-overlay="#staticBackdrop">
                                                            <span class="sr-only">Close</span>
                                                            <i class="ri-close-line"></i>
                                                        </button>
                                                    </div>
                                                    <div class="ti-modal-body px-4">
                                                        <h6 class="modal-title text-[1rem] font-semibold">არ იუ
                                                            შუა?</h6>
                                                    </div>
                                                    <div class="ti-modal-footer">
                                                        <button type="button"
                                                                class="hs-dropdown-toggle ti-btn  ti-btn-secondary-full align-middle"
                                                                data-hs-overlay="#productDelete{{$index}}">
                                                            Close
                                                        </button>
                                                        <form action="{{route('deleteProduct')}}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{$product->id}}">
                                                            <button class="ti-btn bg-primary text-white !font-medium">
                                                                წაშალე მაგის დედაც
                                                            </button>
                                                        </form>
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
@endsection