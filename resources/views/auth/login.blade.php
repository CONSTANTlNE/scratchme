@extends('auth.auth-layout')

@section('register')
            <section id="login-section">
                <!-- Section Spacer -->
                <div class="py-40 pt-36 xl:pb-[200px] xl:pt-[180px]">
                    <!-- Section Container -->
                    <div class="global-container">
                        <div class="mx-auto max-w-[910px] text-center">
                            <h1 class="mb-[50px]">Welcome back</h1>
                            <div
                                class="block rounded-lg bg-white px-[30px] py-[50px] text-left shadow-[0_4px_60px_0_rgba(0,0,0,0.1)] sm:px-10">
                                <!-- Login Form -->
                                <form action="{{route('login')}}" method="post" class="flex flex-col gap-y-5">
                                    @csrf
                                    <!-- Form Group -->
                                    <div class="grid grid-cols-1 gap-6">
                                        <!-- Form Single Input -->
                                        <div class="flex flex-col gap-y-[10px]">
                                            <label for="login-email" class="text-lg font-bold leading-[1.6]">Email
                                                address</label>
                                            <input type="email" name="email" id="login-email"
                                                placeholder="example@gmail.com"
                                                class="rounded-[10px] border border-gray-300 bg-white px-6 py-[18px] font-bold text-black outline-none transition-all placeholder:text-slate-500 focus:border-colorOrangyRed"
                                                required />
                                        </div>
                                        <!-- Form Single Input -->
                                        <!-- Form Single Input -->
                                        <div class="flex flex-col gap-y-[10px]">
                                            <label for="login-password" class="text-lg font-bold leading-[1.6]">Enter
                                                Password</label>
                                            <input type="password" name="password" id="login-password"
                                                placeholder="............"
                                                class="rounded-[10px] border border-gray-300 bg-white px-6 py-[18px] font-bold text-black outline-none transition-all placeholder:text-slate-500 focus:border-colorOrangyRed"
                                                required />
                                        </div>
                                        <!-- Form Single Input -->
                                        <div class="flex flex-wrap justify-between gap-x-10 gap-y-4">
                                            <!-- Form Single Input -->
                                            <div class="flex gap-x-8 gap-y-[10px]">
                                                <input type="checkbox"
                                                    class="relative appearance-none text-base after:absolute after:left-0 after:top-[6px] after:h-4 after:w-4 after:rounded-[3px] after:border after:border-[#7F8995] after:bg-white after:text-white after:transition-all after:delay-300 checked:after:border-colorOrangyRed checked:after:bg-colorOrangyRed checked:after:bg-[url(../img/th-1/icon-white-checkmark-filled.svg)]"
                                                    name="login-check" id="login-check" />
                                                <label for="login-check" class="text-base leading-[1.6]">Remember
                                                    me</label>
                                            </div>
                                            <!-- Form Single Input -->
                                            <a href="reset-password.html"
                                                class="text-base hover:text-colorOrangyRed">Forgot password?</a>
                                        </div>
                                    </div>
                                    <button type="submit"
                                        class="button mt-7 block rounded-[50px] border-2 border-black bg-black py-4 text-white after:bg-colorOrangyRed hover:border-colorOrangyRed hover:text-white">
                                        Sign in
                                    </button>
                                    <!-- Form Group -->
                                </form>
                                <!-- Login Form -->

                                <!-- Socual Logins -->
                                @include('auth.social_login_component')
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
@endsection('register')
