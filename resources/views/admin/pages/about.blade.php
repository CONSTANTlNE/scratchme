@extends('admin.layout')


@section('about')
    <h2 class="mt-7">Create About</h2>

    <form class="mt-3" id="aboutstatusform" action="{{route('aboutStatus')}}" method="post">
        @csrf
        <div class="xl:col-span-4 col-span-12">
            <div class="custom-toggle-switch flex items-center mb-4">
                <input id="status" name="status" type="checkbox" @if(isset($about)&& $about->active===1) checked @endif>
                <label for="status" class="label-success"></label><span class="ms-3"></span>
            </div>
        </div>
    </form>

    <form action="{{route('createAbout')}}" method="post">
        @csrf
        <div class="grid grid-cols-12 gap-6 mt-7">
            <div class="xl:col-span-6 col-span-12">
                <div class=" mb-3 xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                    <p class="mb-2 text-muted">გვერდის სათაური</p>
                    <input type="text" name="title1_ka" class="form-control" id="input">
                </div>
                <div class="xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                    <p class="mb-2 text-muted">ტექსტის სათაური<p>
                    <input type="text" name="title2_ka" class="form-control" id="input">
                </div>
                <div class="xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                    <label for="text-area" class="form-label">ტექსტი</label>
                    <textarea class="form-control" name="content_ka" id="text-area" rows="5"></textarea>
                </div>
            </div>
            <div class="xl:col-span-6 col-span-12">
                <div class=" mb-3 xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                    <p class="mb-2 text-muted">About Page Heading</p>
                    <input type="text" name="title1_en" class="form-control" id="input">
                </div>
                <div class="xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                    <p class="mb-2 text-muted">Content Title</p>
                    <input type="text" name="title2_en" class="form-control" id="input">
                </div>
                <div class="xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                    <label for="text-area" class="form-label">Content</label>
                    <textarea class="form-control" name="content_en" id="text-area" rows="5"></textarea>
                </div>
            </div>
        </div>
        <button class="ti-btn ti-btn-light ti-btn-wave">Create</button>
    </form>


    <h2 class="mt-7">Upload Photos</h2>
    <form method="post" action="{{route('aboutphoto')}}">
        @csrf
        <input id="convertedImage" type="hidden" name="main_img">
        <input id="convertedImage2"  type="hidden" name="secondary_img">
    <div style="max-width: 300px" class=" mb-3 xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
        <p class="mt-3 mb-3 text-muted">ძირითდი ფოტო</p>
        <input onchange="aboutwebp()" type="file" class="form-control"  id="main_img">
    </div>
    <div style="max-width: 300px" class=" mb-3 xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
        <p class="mb-2 text-muted">მეორე ფოტო</p>
        <input onchange="aboutwebp2()" type="file"  class="form-control"  id="secondary_img">
    </div>
    <button class="ti-btn ti-btn-light ti-btn-wave">Upload</button>
    </form>



<h2 style="color:orange" class="mt-7">Update About</h2>

    <form action="{{route('updateAbout')}}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$about->id}}">
        <div class="grid grid-cols-12 gap-6 mt-7">
            <div class="xl:col-span-6 col-span-12">
                <div class=" mb-3 xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                    <p class="mb-2 text-muted">გვერდის სათაური</p>
                    <input type="text" name="title1_ka" class="form-control" value="{{$about->getTranslation('title1','ka')}}" id="input">
                </div>
                <div class="xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                    <p class="mb-2 text-muted">ტექსტის სათაური<p>
                        <input type="text" name="title2_ka" value="{{$about->getTranslation('title2','ka')}}" class="form-control" id="input">
                </div>
                <div class="xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                    <label for="text-area" class="form-label">ტექსტი</label>
                    <textarea class="form-control" name="content_ka" id="text-area" rows="5">{{$about->getTranslation('content','ka')}}</textarea>
                </div>
            </div>
            <div class="xl:col-span-6 col-span-12">
                <div class=" mb-3 xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                    <p class="mb-2 text-muted">About Page Heading</p>
                    <input type="text" name="title1_en" value="{{$about->getTranslation('title1','en')}}" class="form-control" id="input">
                </div>
                <div class="xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                    <p class="mb-2 text-muted">Content Title</p>
                    <input type="text" name="title2_en" value="{{$about->getTranslation('title2','en')}}" class="form-control" id="input">
                </div>
                <div class="xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                    <label for="text-area" class="form-label">Content</label>
                    <textarea class="form-control" name="content_en" id="text-area" rows="5">{{$about->getTranslation('content','en')}}</textarea>
                </div>
            </div>
        </div>
        <button class="ti-btn ti-btn-light ti-btn-wave">update</button>
    </form>

@endsection