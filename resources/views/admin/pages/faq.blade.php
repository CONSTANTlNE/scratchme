@extends('admin.layout')


@section('faq')
    <div class="grid grid-cols-12 gap-6 mt-3">
        <div class="col-span-12">
            <div class="box">
                <div class="box-header justify-start">
                    <h5 style="width: 50px;margin-right: 10px" class="box-title">FAQ</h5>
                    <form action="{{route('createFaq')}}" method="post">
                        @csrf
                        <div class="box-body">
                            <a href="javascript:void(0);" class="ti-btn ti-btn-light ti-btn-wave "
                               data-hs-overlay="#createFaq">
                                Create
                            </a>
                            <div id="createFaq" class="hs-overlay hidden ti-modal  [--overlay-backdrop:static]">
                                <div class="hs-overlay-open:mt-7 ti-modal-box mt-0 ease-out">
                                    <div class="ti-modal-content">
                                        <div class="ti-modal-header">
                                            <h6 class="modal-title text-[1rem] font-semibold">Create FAQ</h6>
                                            <button type="button"
                                                    class="hs-dropdown-toggle !text-[1rem] !font-semibold !text-defaulttextcolor"
                                                    data-hs-overlay="#createFaq">
                                                <span class="sr-only">Close</span>
                                                <i class="ri-close-line"></i>
                                            </button>
                                        </div>
                                        <div class="ti-modal-body px-4">
                                            <form action="{{route('createFaq')}}" method="post">
                                                @csrf
                                                <div class="xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                                                    <label for="question" class="form-label">Question</label>
                                                    <input type="text" class="form-control" id="question"
                                                           name="question">
                                                </div>
                                                <div class="xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12 mt-5">
                                                    <label for="text-area" class="form-label">Answer</label>
                                                    <textarea class="form-control" name="answer" id="text-area"
                                                              rows="4"></textarea>
                                                </div>
                                            </form>

                                        </div>
                                        <div class="ti-modal-footer">
                                            <button type="button"
                                                    class="hs-dropdown-toggle ti-btn  ti-btn-secondary-full align-middle"
                                                    data-hs-overlay="#createFaq">
                                                Close
                                            </button>
                                            <button class="ti-btn bg-primary text-white !font-medium">Create</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="box-body">
                    <div class="overflow-auto">
                        <table id="products-table" class="display text-center"
                               style="width:100%">
                            <thead>
                            <tr>
                                <th style="border:1px solid black ;text-align: center">Question</th>
                                <th style="border:1px solid black ;text-align: center">Answer</th>
                                <th style="border:1px solid black ;text-align: center">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($faqs as $index=> $faq)
                                <tr>
                                    <td>
                                        <p>{{$faq->question}}</p>
                                    </td>
                                    <td>
                                        <p>{{$faq->answer}}</p>
                                    </td>
                                    <td class="flex justify-center align-middle">
                                        {{--Update--}}
                                        @csrf
                                        <div style="padding:0!important;" class="box-body">
                                            <a href="javascript:void(0);" class="ti-btn ti-btn-light ti-btn-wave"
                                               data-hs-overlay="#updateFaq{{$index}}">Update
                                            </a>

                                                <div id="updateFaq{{$index}}"
                                                     class="hs-overlay hidden ti-modal  [--overlay-backdrop:static]">
                                                    <div class="hs-overlay-open:mt-7 ti-modal-box mt-0 ease-out">
                                                        <div class="ti-modal-content">
                                                            <form action="{{route('updateFaq')}}" method="post">
                                                                @csrf
                                                                <input type="hidden" name="id" value="{{$faq->id}}">
                                                            <div class="ti-modal-header">
                                                                <h6 class="modal-title text-[1rem] font-semibold">Modal
                                                                    title</h6>
                                                                <button type="button"
                                                                        class="hs-dropdown-toggle !text-[1rem] !font-semibold !text-defaulttextcolor"
                                                                        data-hs-overlay="#staticBackdrop">
                                                                    <span class="sr-only">Close</span>
                                                                    <i class="ri-close-line"></i>
                                                                </button>
                                                            </div>
                                                            <div class="ti-modal-body px-4">

                                                                    <input type="hidden" name="id" value="{{$faq->id}}">
                                                                    <div class="xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                                                                        <label for="question" class="form-label">Question</label>
                                                                        <input type="text" class="form-control" id="question"
                                                                               name="question" value="{{$faq->question}}">
                                                                    </div>
                                                                    <div class="xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12 mt-5">
                                                                        <label for="text-area" class="form-label">Answer</label>
                                                                        <textarea class="form-control" name="answer" id="text-area"
                                                                                  rows="4" >{{$faq->answer}}</textarea>
                                                                    </div>


                                                            </div>

                                                            <div class="ti-modal-footer">
                                                                <button type="button"
                                                                        class="hs-dropdown-toggle ti-btn  ti-btn-secondary-full align-middle"
                                                                        data-hs-overlay="#updateFaq{{$index}}">
                                                                    Close
                                                                </button>
                                                                <button
                                                                        class="ti-btn bg-primary text-white !font-medium">
                                                                    Update
                                                                </button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                        </div>
                                        {{--Delete--}}
                                        <a style="color:red" href="javascript:void(0);" class="mt-2"
                                           data-hs-overlay="#faqDelete{{$index}}">
                                            <span class="material-symbols-outlined">delete</span>
                                        </a>
                                        <div id="faqDelete{{$index}}"
                                             class="hs-overlay hidden ti-modal  [--overlay-backdrop:static]">
                                            <div class="hs-overlay-open:mt-7 ti-modal-box mt-0 ease-out">
                                                <div class="ti-modal-content">
                                                    <div class="ti-modal-header">
                                                        <h6 class="modal-title text-[1rem] font-semibold"></h6>
                                                        <button type="button"
                                                                class="hs-dropdown-toggle !text-[1rem] !font-semibold !text-defaulttextcolor"
                                                                data-hs-overlay="#faqDelete">
                                                            <span class="sr-only">Close</span>
                                                            <i class="ri-close-line"></i>
                                                        </button>
                                                    </div>
                                                    <div class="ti-modal-body px-4">
                                                        <h6 class="modal-title text-[1rem] font-semibold">
                                                            are you sure ?</h6>
                                                    </div>
                                                    <div class="ti-modal-footer">
                                                        <button type="button"
                                                                class="hs-dropdown-toggle ti-btn  ti-btn-secondary-full align-middle"
                                                                data-hs-overlay="#faqDelete{{$index}}">
                                                            Close
                                                        </button>
                                                        <form action="{{route('faqDelete')}}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{$faq->id}}">
                                                            <button class="ti-btn bg-primary text-white !font-medium">
                                                                Delete
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