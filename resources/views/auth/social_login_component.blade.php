
<div>
    <div
            class="relative z-[1] mb-14 mt-9 text-center font-bold before:absolute before:left-0 before:top-1/2 before:-z-[1] before:h-[1px] before:w-full before:-translate-y-1/2 before:bg-[#EAEDF0]">
        <span class="inline-block bg-white px-6">Or</span>
    </div>

    <!-- API login -->
    <div class="flex flex-col gap-y-6">
        <!-- Google API login Button -->
        <a  style="cursor: pointer;" href="{{ route('social.login', ['provider' => 'google']) }}"
                class="button flex w-full justify-center gap-x-4 rounded-[50px] border-2 border-[#EAEDF0] bg-white py-4 hover:bg-slate-200">
                                        <span class="hidden h-6 w-6 sm:inline-block">
                                            <img src="{{asset('landing_assets/img/th-1/flat-color-icons-google.svg')}}"
                                                 alt="flat-color-icons-google" width="24" height="24" />
                                        </span>
            Signup with Google
        </a>
        <!-- Google API login Button -->
        <!-- Facebook API login Button -->
        <a style="cursor: pointer;"  href="{{ route('social.login', ['provider' => 'facebook']) }}"
                class="button flex w-full justify-center gap-x-4 rounded-[50px] border-2 border-[#EAEDF0] bg-white py-4 hover:bg-slate-200">
                                        <span class="hidden h-6 w-6 sm:inline-block">
                                            <img src="{{asset('landing_assets/img/th-1/flat-color-icon-facebook.svg')}}"
                                                 alt="flat-color-icon-facebook" width="24" height="24" />
                                        </span>
            Signup with Facebook
        </a>
        <!-- Facebook API login Button -->
    </div>
    <!-- API login -->
</div>
