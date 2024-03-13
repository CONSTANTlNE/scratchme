@extends('admin.layout')


@section('products')
{{--    @php dd($locales) @endphp--}}

    <div class="box">
        <div class="box-header">
            <h5 class="box-title">Add Product</h5>
        </div>
        <div class="box-body">
            <div class="border-b-0 border-gray-200 dark:border-white/10">
                <nav class="flex space-x-2 rtl:space-x-reverse" aria-label="Tabs">
                    @foreach($locales as $index=> $locale)
{{--                            @php dd($locale['abbr']) @endphp--}}

                        <button type="button"
                                class="hs-tab-active:bg-white hs-tab-active:border-b-transparent hs-tab-active:text-primary dark:hs-tab-active:bg-transparent dark:hs-tab-active:border-b-white/10 dark:hs-tab-active:text-primary -mb-px py-2 px-3 inline-flex items-center gap-2 bg-gray-50 text-sm font-medium text-center border text-defaulttextcolor rounded-t-sm hover:text-primary dark:bg-black/20 dark:border-white/10 dark:text-[#8c9097] dark:text-white/50 dark:hover:text-gray-300 active"
                                id="hs-tab-js-behavior-item-{{$index}}" data-hs-tab="#hs-tab-js-behavior-{{$index}}"
                                aria-controls="hs-tab-js-behavior-{{$index}}">
                            {{$locale['language']}}
                        </button>
                    @endforeach

                </nav>
            </div>
            <form action="{{route('storeProduct')}}" method="post"
                  enctype="multipart/form-data">
            <div class="">
                @foreach($locales as $index=> $locale)
                    @if($loop->first)
                        <div id="hs-tab-js-behavior-{{$index}}" role="tabpanel"
                             aria-labelledby="hs-tab-js-behavior-item-{{$index}}">
                            <div class="grid grid-cols-12 gap-6 m-auto mt-3">
                                <div class="xl:col-span-6 col-span-12">
                                    <div class="box">
                                        <div class="box-header justify-center text-center">
                                            <div class="box-title">
                                                პროდუქტის დამატება
                                            </div>
                                        </div>
                                        @csrf
                                        <div class="box-body">
                                            <div class="grid grid-cols-12 gap-y-3">
                                                <div class="xl:col-span-12 col-span-12">
                                                    <label for="product_name" class="form-label">პროდუქტის სახელი</label>
                                                    <input type="text" class="form-control " id="product_name"
                                                           placeholder="No Radius" name="product_name{{$locale['abbr']}}">
                                                </div>
                                                <div class="xl:col-span-12 col-span-12">
                                                    <label for="short_description{{$index}}" class="form-label">მოკლე აღწერა</label>
                                                    <input type="text" class="form-control" id="short_description{{$index}}"
                                                           placeholder="Default Radius" name="short_description{{$locale['abbr']}}">
                                                </div>
                                                <div class="xl:col-span-12 col-span-12">
                                                    <label for="long_description{{$locale['abbr']}}" class="form-label">ვრცელი აღწერა</label>

                                                    <textarea class="form-control " id="long_description{{$locale['abbr']}}"
                                                              name="long_description{{$locale['abbr']}}"></textarea>
                                                    <div class="flex align-middle gap-2  mt-3">
                                                        <label for="feature{{$locale['abbr']}}" class="form-label">მახასიათებლები</label>
                                                    </div>
                                                    <template class="features-template" id="features-template{{$locale['abbr']}}">
                                                        <div class="flex justify-center align-middle mt-2">

                                                            <input style="display: inline" type="text"
                                                                   class="form-control" id="feature{{$locale['abbr']}}"
                                                                   placeholder="Default Radius" name="feature{{$locale['abbr']}}[]">
                                                            <span style="color:red;margin-left: 5px;cursor: pointer;padding-top:10px"
                                                                  class="removeButton{{$locale['abbr']}} material-symbols-outlined" >remove</span>
                                                        </div>
                                                    </template>
                                                    <div class="xl:col-span-12 col-span-12 myDiv" id="myDiv{{$locale['abbr']}}">

                                                    </div>
                                                    <div class="flex align-middle gap-2 justify-center mt-3">
                                                        <p style="display: inline;padding-top:2px">დამატება</p>
                                                        <span id="featuresButton{{$locale['abbr']}}" style="color:green;cursor:pointer;"
                                                              class="featuresButton material-symbols-outlined">add</span>
                                                    </div>
                                                </div>
                                                <div class="xl:col-span-4 col-span-12">
                                                    <label for="price{{$locale['abbr']}}" class="form-label">ფასი</label>
                                                    <input type="text" class="form-control" id="price{{$locale['abbr']}}"
                                                           placeholder="Default Radius"
                                                           name="price">
                                                </div>
                                                <div class="xl:col-span-12 col-span-12">
                                                    <div class="form-check">
                                                        <label for="for_landing{{$locale['abbr']}}" class="form-label">მთავარ გვერდზე?</label>
                                                        <input id="for_landing{{$locale['abbr']}}" class="form-check-input ms-2"
                                                               type="checkbox" value=""
                                                               checked="" name="for_landing{{$locale['abbr']}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex justify-center">
                                                <button class=" ti-btn ti-btn-light ti-btn-wave">შექმნა</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="xl:col-span-6 col-span-12">
                                    <div class="box">
                                        <div class="box-header justify-between">
                                            <div class="box-title">
                                                ფოტო
                                            </div>

                                        </div>
                                        <div class="box-body text-center">
                                            <div class="grid grid-cols-12 gap-y-3">
                                                <div class="xl:col-span-12 col-span-12">
                                                    <img style="max-height:494px" id="imagePreview"
                                                         src="{{asset('landing_assets/img/blank_image.jpg')}}"
                                                         class="hidden dark:block m-auto"
                                                         alt="Hero Image - Dark Mode"
                                                    />
                                                    <input style="display:none" type="file" name="product_image"
                                                           id="imageInput">
                                                </div>
                                            </div>
                                            <button id="uploadProfileImage"
                                                    type="button" class="ti-btn ti-btn-light ti-btn-wave ">
                                                ატვირთვა
                                            </button>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    @else
                        <div id="hs-tab-js-behavior-{{$index}}" class="hidden" role="tabpanel"
                             aria-labelledby="hs-tab-js-behavior-item-{{$index}}">
                            <div class="grid grid-cols-12 gap-6 m-auto mt-3">
                                <div class="xl:col-span-6 col-span-12">
                                    <div class="box">
                                        <div class="box-header justify-between">
                                            <div class="box-title">
                                                Add Product
                                            </div>
                                        </div>
                                        @csrf
                                        <div class="box-body">
                                            <div class="grid grid-cols-12 gap-y-3">
                                                <div class="xl:col-span-12 col-span-12">
                                                    <label for="product_name{{$locale['abbr']}}" class="form-label">Product Name</label>
                                                    <input type="text" class="form-control " id="product_name{{$locale['abbr']}}"
                                                           placeholder="No Radius" name="product_name{{$locale['abbr']}}">
                                                </div>
                                                <div class="xl:col-span-12 col-span-12">
                                                    <label for="short_description{{$locale['abbr']}}" class="form-label">Short
                                                        Description</label>
                                                    <input type="text" class="form-control" id="short_description{{$locale['abbr']}}"
                                                           placeholder="Default Radius" name="short_description{{$locale['abbr']}}">

                                                </div>
                                                <div class="xl:col-span-12 col-span-12">
                                                    <label for="long_description{{$locale['abbr']}}" class="form-label">Long
                                                        Description</label>

                                                    <textarea class="form-control " id="long_description{{$locale['abbr']}}"
                                                              name="long_description{{$locale['abbr']}}"></textarea>
                                                    <div class="flex align-middle gap-2  mt-3">
                                                        <label for="feature" class="form-label">Features</label>
                                                    </div>
                                                    <template class="features-template" id="features-template{{$locale['abbr']}}">
                                                        <div class="flex justify-center align-middle mt-2">

                                                            <input style="display: inline" type="text"
                                                                   class="form-control" id="feature{{$locale['abbr']}}"
                                                                   placeholder="Default Radius" name="feature[{{$locale['abbr']}}][]">
                                                            <span style="color:red;margin-left: 5px;cursor: pointer;padding-top:10px"
                                                                  class="removeButton{{$locale['abbr']}} material-symbols-outlined">remove</span>

                                                        </div>
                                                    </template>
                                                    <div class="xl:col-span-12 col-span-12 myDiv" id="myDiv{{$locale['abbr']}}" >

                                                    </div>
                                                    <div class="flex align-middle gap-2 justify-center mt-3">
                                                        <p style="display: inline;padding-top:2px">Add Feature</p>
                                                        <span id="featuresButton{{$locale['abbr']}}" style="color:green;cursor:pointer;"
                                                              class="featuresButton material-symbols-outlined">add</span>
                                                    </div>
                                                </div>
{{--                                                <div class="xl:col-span-4 col-span-12">--}}
{{--                                                    <label for="pricemyDiv{{$locale['abbr']}}" class="form-label">Price</label>--}}
{{--                                                    <input type="text" class="form-control" id="pricemyDiv{{$locale['abbr']}}"--}}
{{--                                                           placeholder="Default Radius"--}}
{{--                                                           name="pricemyDiv{{$locale['abbr']}}">--}}
{{--                                                </div>--}}
{{--                                                <div class="xl:col-span-12 col-span-12">--}}
{{--                                                    <div class="form-check">--}}
{{--                                                        <label for="for_landing" class="form-label">For landing--}}
{{--                                                            ?</label>--}}
{{--                                                        <input id="for_landing" class="form-check-input ms-2"--}}
{{--                                                               type="checkbox" value=""--}}
{{--                                                               checked="" name="for_landingmyDiv{{$locale['abbr']}}">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
                                            </div>
{{--                                            <div class="flex justify-center">--}}
{{--                                                <button class=" ti-btn ti-btn-light ti-btn-wave">Create</button>--}}
{{--                                            </div>--}}
                                        </div>
                                    </div>
                                </div>
{{--                                <div class="xl:col-span-6 col-span-12">--}}
{{--                                    <div class="box">--}}
{{--                                        <div class="box-header justify-between">--}}
{{--                                            <div class="box-title">--}}
{{--                                                Product Image--}}
{{--                                            </div>--}}

{{--                                        </div>--}}
{{--                                        <div class="box-body text-center">--}}
{{--                                            <div class="grid grid-cols-12 gap-y-3">--}}
{{--                                                <div class="xl:col-span-12 col-span-12">--}}
{{--                                                    <img style="max-height:494px" id="imagePreview"--}}
{{--                                                         src="{{asset('landing_assets/img/blank_image.jpg')}}"--}}
{{--                                                         class="hidden dark:block m-auto"--}}
{{--                                                         alt="Hero Image - Dark Mode"--}}
{{--                                                    />--}}
{{--                                                    <input style="display:none" type="file" name="product_image"--}}
{{--                                                           id="imageInput">--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <button id="uploadProfileImage"--}}
{{--                                                    type="button" class="ti-btn ti-btn-light ti-btn-wave ">--}}
{{--                                                upload--}}
{{--                                            </button>--}}
{{--                                        </div>--}}

{{--                                    </div>--}}

{{--                                </div>--}}
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            </form>

        </div>
    </div>



@endsection