@extends('admin.layout')
@section('change-photo')

    <form action="{{route('updatePhotos')}}" method="post">
        @csrf
        <input type="hidden" value="{{$id}}" name="id">
        <input id="convertedImage" type="hidden" name="photo[]">
        <input id="convertedImage2"  type="hidden" name="photo[]">
        <input id="convertedImage3"  type="hidden" name="photo[]">
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
                            <img style="max-height:494px"
                                 src="{{asset('landing_assets/img/blank_image.jpg')}}"
                                 class="imagePreview hidden dark:block m-auto"
                                 alt="Hero Image - Dark Mode"
                            />
                            <input id="imageInput" onchange="convertToWebP()" class="imageInput" style="display:none"
                                   type="file" name="product_image[]"
                            >
                        </div>
                        @error('product_image')
                        <p class="text-danger xl:col-span-12 col-span-12">{{$message}}</p>
                        @enderror
                    </div>
                    <button
                            type="button" class="uploadProfileImage ti-btn ti-btn-light ti-btn-wave ">
                        ატვირთვა
                    </button>
                </div>
                <div class="box-body text-center">
                    <div class="grid grid-cols-12 gap-y-3">
                        <div class="xl:col-span-12 col-span-12">
                            <img style="max-height:494px"
                                 src="{{asset('landing_assets/img/blank_image.jpg')}}"
                                 class="imagePreview hidden dark:block m-auto"
                                 alt="Hero Image - Dark Mode"/>
                            <input id="imageInput2" onchange="convertToWebP2()" style="display:none" type="file"
                                   name="product_image[]"
                                   class="imageInput">
                        </div>
                        @error('product_image')
                        <p class="text-danger xl:col-span-12 col-span-12">{{$message}}</p>
                        @enderror
                    </div>
                    <button type="button" class="uploadProfileImage ti-btn ti-btn-light ti-btn-wave ">
                        ატვირთვა
                    </button>
                </div>
                <div class="box-body text-center">
                    <div class="grid grid-cols-12 gap-y-3">
                        <div class="xl:col-span-12 col-span-12">
                            <img style="max-height:494px"
                                 src="{{asset('landing_assets/img/blank_image.jpg')}}"
                                 class="imagePreview hidden dark:block m-auto"
                                 alt="Hero Image - Dark Mode"/>
                            <input id="imageInput3" onchange="convertToWebP3()" style="display:none" type="file"
                                   name="product_image[]"
                                   class="imageInput">
                        </div>
                        @error('product_image')
                        <p class="text-danger xl:col-span-12 col-span-12">{{$message}}</p>
                        @enderror
                    </div>
                    <button
                            type="button" class="uploadProfileImage ti-btn ti-btn-light ti-btn-wave ">
                        ატვირთვა
                    </button>

                    <div class="flex justify-center mt-5">
                        <button class="ti-btn ti-btn-secondary-full ti-btn-wave">ფოტოების განახლება</button>
                    </div>
                </div>

            </div>
        </div>
    </form>
@endsection