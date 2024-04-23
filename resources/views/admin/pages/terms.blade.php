@extends('admin.layout')


@section('terms')

    <form action="{{route('createTerm')}}" method="post">
        @csrf
        <div class="grid grid-cols-12 gap-6 mt-7">
        <div class="xl:col-span-6 col-span-12">
            <div class=" mb-3 xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                <p class="mb-2 text-muted">გვერდის სათაური</p>
                <input type="text" name="page_title_ka" class="form-control" id="input">

            </div>
            <div class="xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                <p class="mb-2 text-muted">პირობის სათაური</p>
                <input type="text" name="term_ka" class="form-control" id="input">
                @error('term_ka')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                <label for="text-area" class="form-label">პირობის აღწერა</label>
                <textarea name="description_ka" class="form-control" id="text-area" rows="5"></textarea>
                @error('description_ka')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

        </div>
        <div class="xl:col-span-6 col-span-12">
            <div class=" mb-3 xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                <p class="mb-2 text-muted">Terms and Conditions Page Heading</p>
                <input type="text" name="page_title_en" class="form-control" id="input">
            </div>
            <div class="xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                <p class="mb-2 text-muted">Term Title</p>
                <input type="text" name="term_en" class="form-control" id="input">
                @error('term_en')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                <label for="text-area" class="form-label">Term Description</label>
                <textarea name="description_en" class="form-control" id="text-area" rows="5"></textarea>
                @error('description_en')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

        </div>
            <button class="ti-btn ti-btn-light ti-btn-wave ">Create</button>

        </div>
    </form>

    <div class="box-body">
        <div class="hs-accordion-group">
            @foreach($terms as $index => $term)
            <div class="hs-accordion accordion-item overflow-hidden !border-b-0" id="hs-basic-with-arrow-heading-one{{$index}}">
                <button class="hs-accordion-toggle accordion-button hs-accordion-active:text-primary hs-accordion-active:pb-3 group py-0 inline-flex items-center gap-x-3 w-full font-semibold text-start text-gray-800 transition hover:text-gray-500 dark:hs-accordion-active:text-primary dark:text-gray-200 dark:hover:text-white/80"
                        aria-controls="hs-basic-with-arrow-collapse-one{{$index}}" type="button">
                    <svg class="hs-accordion-active:hidden hs-accordion-active:text-primary hs-accordion-active:group-hover:text-primary block w-3 h-3 text-gray-600 group-hover:text-gray-500 dark:text-[#8c9097] dark:text-white/50"
                         width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 5L8.16086 10.6869C8.35239 10.8637 8.64761 10.8637 8.83914 10.6869L15 5"
                              stroke="currentColor" stroke-width="2" stroke-linecap="round"></path>
                    </svg>
                    <svg class="hs-accordion-active:block hs-accordion-active:text-primary hs-accordion-active:group-hover:text-primary hidden w-3 h-3 text-gray-600 group-hover:text-gray-500 dark:text-[#8c9097] dark:text-white/50"
                         width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 11L8.16086 5.31305C8.35239 5.13625 8.64761 5.13625 8.83914 5.31305L15 11"
                              stroke="currentColor" stroke-width="2" stroke-linecap="round"></path>
                    </svg>
                    {{$term->term}}
                </button>
                <div id="hs-basic-with-arrow-collapse-one{{$index}}"
                     class="hs-accordion-content w-full hidden overflow-hidden transition-[height] duration-300"
                     aria-labelledby="hs-basic-with-arrow-heading-one{{$index}}" style="height: 0px;">
                    <div class="accordion-body">
                        {{$term->description}}

                        <div class="flex justify-center gap-3">
                        <form action="{{route('deleteTerm')}}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$term->id}}">
                            <button  class="ti-btn ti-btn-danger-full ti-btn-wave mt-5">
                                Delete
                            </button>
                        </form>
                        <a href="javascript:void(0);" class="hs-dropdown-toggle ti-btn ti-btn-wave ti-btn-primary-full mt-5" data-hs-overlay="#todo-compose{{$index}}">change
                        </a>
                        <div id="todo-compose{{$index}}" class="hs-overlay hidden ti-modal">
                            <div class="hs-overlay-open:mt-7 ti-modal-box mt-0 ease-out">
                                <form action="{{route('updateTerm')}}" method="post">
                                    <input type="hidden" name="id" value="{{$term->id}}">
                                <div class="ti-modal-content">
                                    <div class="ti-modal-header">
                                        <h6 class="modal-title text-[1rem] font-semibold" id="mail-ComposeLabel">Modal title</h6>
                                        <button type="button" class="hs-dropdown-toggle !text-[1rem] !font-semibold !text-defaulttextcolor" data-hs-overlay="#todo-compose">
                                            <span class="sr-only">Close</span>
                                            <i class="ri-close-line"></i>
                                        </button>
                                    </div>
                                    <div class="ti-modal-body px-4">

                                            @csrf
                                            <div class="grid grid-cols-12 gap-6 mt-7">
                                                <div class="xl:col-span-6 col-span-12">
                                                    <div class=" mb-3 xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                                                        <p class="mb-2 text-muted">გვერდის სათაური</p>
                                                        <input type="text" value="{{$term->getTranslation('page_title','ka')}}" name="page_title_ka" class="form-control" id="input">

                                                    </div>
                                                    <div class="xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                                                        <p class="mb-2 text-muted">პირობის სათაური</p>
                                                        <input type="text" value="{{$term->getTranslation('term','ka')}}" name="term_ka" class="form-control" id="input">
                                                        @error('term_ka')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                                                        <label for="text-area" class="form-label">პირობის აღწერა</label>
                                                        <textarea name="description_ka" class="form-control" id="text-area" rows="5">
                                                            {{$term->getTranslation('description','ka')}}
                                                        </textarea>
                                                        @error('description_ka')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>

                                                </div>
                                                <div class="xl:col-span-6 col-span-12">
                                                    <div class=" mb-3 xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                                                        <p class="mb-2 text-muted">Terms and Conditions Page Heading</p>
                                                        <input type="text" name="page_title_en" value="{{$term->getTranslation('page_title','en')}}" class="form-control" id="input">
                                                    </div>
                                                    <div class="xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                                                        <p class="mb-2 text-muted">Term Title</p>
                                                        <input type="text" name="term_en" value="{{$term->getTranslation('term','en')}}" class="form-control" id="input">
                                                        @error('term_en')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                                                        <label for="text-area" class="form-label">Term Description</label>
                                                        <textarea name="description_en"  class="form-control" id="text-area" rows="5">
                                                            {{$term->getTranslation('description','en')}}
                                                        </textarea>
                                                        @error('description_en')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>

                                                </div>

                                            </div>

                                    </div>
                                    <div class="ti-modal-footer">
                                        <button type="button"
                                                class="hs-dropdown-toggle ti-btn  ti-btn-secondary-full align-middle"
                                                data-hs-overlay="#todo-compose{{$index}}">
                                            Close
                                        </button>
                                        <button  class="ti-btn bg-primary text-white !font-medium">Save Changes</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection