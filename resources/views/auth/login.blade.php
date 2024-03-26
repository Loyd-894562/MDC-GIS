@extends('normal-view.layout.base')

@section('title')
    Login
@endsection

@section('content')
    <div class="container mx-auto mt-10">
        <div class="md:flex md:items-center md:justify-center">
            <div class="w-full md:w-[1000px] bg-white shadow-md rounded px-8 py-8">
                <div class="flex flex-col md:flex-row">
                    <!-- Left Side (Logo and Institution Name) -->
                    <div class="md:w-[50%] md:pr-4 flex flex-col items-center justify-center">
                        <img src="{{ asset('images/logo1.jpg') }}" alt="Logo" class="max-w-[415px] mx-auto mb-4">
                        <p class="text-center text-lg font-bold">Mater Dei College - Guidance Information System</p>
                    </div>
                    <!-- Right Side (Login Form) -->
                    <div class="md:w-[50%] md:pl-4">
                        <div class="bg-white shadow-md rounded px-8 py-8">
                            <p class="text-dark text-center text-xl font-bold mb-4">LOGIN</p>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="mb-4 relative">
                                    <label for="id_number" class="block text-dark font-bold mb-2">Email</label>
                                    <input type="email" id="email" placeholder="Email" name="email"
                                        class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500"
                                        required autocomplete="email" autofocus />
                                    @error('email')
                                        <div class="text-sm text-red-500 italic">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-6 relative">
                                    <label for="password" class="block text-dark font-bold mb-2">Password</label>
                                    <input type="password" name="password" id="password" placeholder="Password" required
                                        autofocus autocomplete="current-password"
                                        class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500" />
                                    @error('password')
                                        <div class="text-sm text-red-500 italic">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label class="text-dark mr-2">
                                        <input type="checkbox" class="mr-1" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }} />
                                        <span class="text-sm">Remember Me</span>
                                    </label>
                                </div>
                                <div class="flex flex-col items-center">
                                    <button
                                        class="bg-sky-500 w-full hover:bg-sky-600 text-white font-bold py-3 px-10 focus:outline-none focus:shadow-outline mb-4"
                                        type="submit" style="border-radius: 20px;">
                                        Login
                                    </button>
                                    <div class="items-center md:flex md:justify-center">
                                        <a href="#" class="text-blue-500 md:ml-4">Forgot Password</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
