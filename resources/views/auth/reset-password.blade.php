@extends('auth.auth-layout')

@section('password-reset')
 <section id="password-reset-section">
                <!-- Section Spacer -->
                <div class="py-40 pt-36 xl:pb-[200px] xl:pt-[180px]">
                    <!-- Section Container -->
                    <div class="global-container">
                        <div class="mx-auto max-w-[910px] text-center">
                            <h1 class="mb-[50px]">Reset Password</h1>
                            <div class="block rounded-lg bg-white px-[30px] py-[50px] text-left shadow-[0_4px_60px_0_rgba(0,0,0,0.1)] sm:px-10">
                                <!-- Password Reset Form -->
                                <form action="#" method="post" class="flex flex-col gap-y-5">
                                    <!-- Form Group -->
                                    <div class="grid grid-cols-1 gap-6">
                                        <!-- Form Single Input -->
                                        <div class="flex flex-col gap-y-[10px]">
                                            <label for="password-reset-email" class="text-lg font-bold leading-[1.6]">Email address</label>
                                            <input type="email" name="password-reset-email" id="password-reset-email" placeholder="example@gmail.com" class="rounded-[10px] border border-gray-300 bg-white px-6 py-[18px] font-bold text-black outline-none transition-all placeholder:text-slate-500 focus:border-colorOrangyRed" required />
                                        </div>
                                        <!-- Form Single Input -->
                                        <!-- Form Single Input -->
                                        <div class="flex flex-col gap-y-[10px]">
                                            <label for="password-reset-password" class="text-lg font-bold leading-[1.6]">Enter Password</label>
                                            <input type="password" name="password-reset-password" id="password-reset-password" placeholder="............" class="rounded-[10px] border border-gray-300 bg-white px-6 py-[18px] font-bold text-black outline-none transition-all placeholder:text-slate-500 focus:border-colorOrangyRed" required />
                                        </div>
                                        <!-- Form Single Input -->
                                    </div>
                                    <button type="submit" class="button mt-7 block rounded-[50px] border-2 border-black bg-black py-4 text-white after:bg-colorOrangyRed hover:border-colorOrangyRed hover:text-white">
                                        Change password
                                    </button>
                                    <!-- Form Group -->
                                </form>
                                <!-- Password Reset Form -->
                                <p class="mt-6 text-center text-base">
                                    If you didn’t request a password recovery link, please
                                    ignore this.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Section Container -->
                </div>
                <!-- Section Spacer -->
            </section>
@endsection
