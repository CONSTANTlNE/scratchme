@extends('auth.auth-layout')

@section('register')
            <section id="signup-section">
                <!-- Section Spacer -->
                <div class="py-40 pt-36 xl:pb-[200px] xl:pt-[180px]">
                    <!-- Section Container -->
                    <div class="global-container">
                        <div class="mx-auto max-w-[910px] text-center">
                            <h1 class="mb-[50px]">Create Account</h1>
                            <div
                                class="block rounded-lg bg-white px-[30px] py-[50px] text-left shadow-[0_4px_60px_0_rgba(0,0,0,0.1)] sm:px-10">
                                <!-- Sign Up Form -->
                                <form action="{{route('register')}}" method="post" class="flex flex-col gap-y-5">
                                    @csrf
                                    <!-- Form Group -->
                                    <div class="grid grid-cols-1 gap-6">
                                        <!-- Form Single Input -->
                                        <div class="flex flex-col gap-y-[10px]">
                                            <label for="signup-name" class="text-lg font-bold leading-[1.6]">Enter your
                                                name</label>
                                            <input type="text" name="name" id="signup-name"
                                                placeholder="Adam Smith"
                                                class="rounded-[10px] border border-gray-300 bg-white px-6 py-[18px] font-bold text-black outline-none transition-all placeholder:text-slate-500 focus:border-colorOrangyRed"
                                                required />
                                            @error('name')
                                            <p style="color:red">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <!-- Form Single Input -->
                                        <!-- Form Single Input -->
                                        <div class="flex flex-col gap-y-[10px]">
                                            <label for="signup-email" class="text-lg font-bold leading-[1.6]">Email
                                                address</label>
                                            @if(session('email'))
                                                <p style="color: red">{{session('email')}}</p>
                                            @endif
                                            <input type="email" name="email" id="signup-email"
                                                placeholder="example@gmail.com"
                                                class="rounded-[10px] border border-gray-300 bg-white px-6 py-[18px] font-bold text-black outline-none transition-all placeholder:text-slate-500 focus:border-colorOrangyRed"
                                                required />
                                            @error('email')
                                            <p style="color:red">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <!-- Form Single Input -->
                                        <!-- Form Single Input -->
                                        <div class="flex flex-col gap-y-[10px]">
                                            <label for="signup-password" class="text-lg font-bold leading-[1.6]">Enter
                                                Password</label>
                                            <input type="password" name="password" id="signup-password"
                                                placeholder="............"
                                                class="rounded-[10px] border border-gray-300 bg-white px-6 py-[18px] font-bold text-black outline-none transition-all placeholder:text-slate-500 focus:border-colorOrangyRed"
                                                required autocomplete="off"/>
                                            @error('password')
                                            <p style="color:red">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="flex flex-col gap-y-[10px]">
                                            <label for="confirm-password" class="text-lg font-bold leading-[1.6]">repeat
                                                Password</label>
                                            <input type="password" name="password_confirmation" id="confirm-password"
                                                   placeholder="............"
                                                   class="rounded-[10px] border border-gray-300 bg-white px-6 py-[18px] font-bold text-black outline-none transition-all placeholder:text-slate-500 focus:border-colorOrangyRed"
                                                   required autocomplete="off"/>
                                            @error('password_confirmation')
                                            <p style="color:red">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <!-- Form Single Input -->
                                        <!-- Form Single Input -->
                                        <div class="flex gap-x-8 gap-y-[10px]">
                                            <input type="checkbox"
                                                class="relative appearance-none after:absolute after:left-0 after:top-[6px] after:h-4 after:w-4 after:rounded-[3px] after:border after:border-[#7F8995] after:bg-white after:text-white after:transition-all after:delay-300 checked:after:border-colorOrangyRed checked:after:bg-colorOrangyRed checked:after:bg-[url(../img/th-1/icon-white-checkmark-filled.svg)]"
                                                name="signup-check" id="signup-check"/>
                                            <label for="signup-check" class="text-base leading-[1.6]">I have read and
                                                accept the
                                                <a href="#" class="font-bold hover:text-colorOrangyRed">Terms &
                                                    Conditions</a>
                                                and
                                                <a href="#" class="font-bold hover:text-colorOrangyRed">Privacy
                                                    Policy</a></label>
                                        </div>
                                        <!-- Form Single Input -->
                                    </div>
                                    <button>submit</button>
                                    <button type="submit"
                                        class="button mt-7 block rounded-[50px] border-2 border-black bg-black py-4 text-white after:bg-colorOrangyRed hover:border-colorOrangyRed hover:text-white">
                                        Create account
                                    </button>
                                    <!-- Form Group -->
                                </form>
                                <!-- Sign Up Form -->

                                <!-- API Signup -->
               @include('auth.social_login_component')
                                <!-- API Signup -->
                                <div class="mt-10 text-center">
                                    Already have an account?
                                    <a href="login.html" class="text-base font-semibold hover:text-colorOrangyRed">Log
                                        in here</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Section Container -->
                </div>
                <!-- Section Spacer -->
            </section>
@endsection