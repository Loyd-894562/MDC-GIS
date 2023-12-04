@extends('normal-view.layout.base')

@section('title')
    Home
@endsection

@section('content')
<div class="flex items-center justify-center h-full">
    <div class="mx-auto px-4">
        <div class="text-center mb-8">
            <h1 class="bg-white px-2 rounded"></h1>
        </div>
        <div class="pt-10 pb-5" style="background-color: rgba(255, 255, 255, 1); border-radius: 20px; width:100%;">
            <div class="shadow-lg rounded-lg overflow-hidden">
                <div class="p-4 text-center">
                    <div class="logo h-20 w-20 mx-auto">
                        <img src="/images/logo.png" alt="Logo" class="rounded-full" />
                    </div>
                    <div class="mt-5">
                        <p class="text-gray-800 text-4xl font-extrabold" style="font-family: sans-serif;">
                            <strong class="font-extrabold">WELCOME TOMDC GUIDANCE</strong><br /><strong>INFORMATION SYSTEM</strong>
                        </p>
                    </div>
                    <p class="mt-5 text-2xl font-extrabold text-gray-800"
                        style="font-family: 'Times New Roman', Times, serif;">
                        Discover yourself
                    </p>
                    <p class="mb-4 text-2xl font-extrabold text-gray-800"
                        style="font-family: 'Times New Roman', Times, serif;">
                        Take the test to find the perfect who you are
                    </p>
                    <br />
                    <a v-if="!auth.user" href="/login"
                        class="bg-sky-500 text-white py-3 font-bold px-10 rounded-md hover:bg-sky-600 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2"
                        style="border-radius: 20px;">Getting Started</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
