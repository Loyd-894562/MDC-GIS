@extends('normal-view.layout.base')

@section('title')
    Home
@endsection

@section('content')
<div class="flex items-center justify-center h-full bg-opacity-5 " >
    <div class="mx-auto px-4 " >
        <div class="text-center mb-8" style="margin-top: 30px;">
            <h1 class="bg-white px-2 rounded"></h1>
        </div>
        <div class="pt-10 pb-5" style="background-color: white; border-radius: 20px; width:100%;">
            <div class="shadow-lg rounded-lg overflow-hidden">
                <div class="p-4 text-center">
                    <div class="logo h-40 w-40 mx-auto"> <!-- Increased height and width of the logo -->
                        <img src="/images/logo1.jpg" alt="Logo" class="rounded-full" />
                    </div>
                    <div class="mt-4">
                        <p class="text-gray-800 text-4xl font-extrabold" style="font-family: sans-serif;">
                            <strong class="font-extrabold">WELCOME TO </strong><br /><strong>MDC GUIDANCE INFORMATION SYSTEM</strong>
                        </p>
                    </div>
                  
                    <br />
                    <a v-if="!auth.user" href="/dashboard"
                        class="bg-sky-500 text-white py-3 font-bold px-10 rounded-md hover:bg-sky-600 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2 mt-3"
                        style="border-radius: 20px;">Get Started</a>
                </div>
            </div>
        </div>
    </div>
</div>



 <div class="mt-6 text-center " style="margin-top: 200px;">
   
    <div class="flex justify-center items-center">
        <div class="mr-4 flex items-center " style="margin: 60px;"> <!-- Added class to align items -->
            <a href="https://www.facebook.com/mdcguidance" target="_blank">
                <img src="/images/facebook_logo.png" alt="Facebook" class="w-10 h-10 rounded-full">
            </a>
            <span class="ml-2 font-bold">Mater Dei College - Guidance Office</span>
        </div>
        <div class="mr-4 flex items-center " style="margin: 60px;"> <!-- Added class to align items -->
            <a href="mailto:mdcguidance@gmail.com" target="_blank">
                <img src="/images/gmail_logo.png" alt="Gmail" class="w-10 h-10 rounded-full">
            </a>
            <span class="ml-2 font-bold">mdcguidance@gmail.com</span>
        </div>
        <div class="flex items-center" style="margin: 60px;">
            <img src="/images/telephone_logo.png" alt="Telephone" class="w-10 h-10 rounded-full">
            <span class="ml-2 text-black font-bold">508-8106 (Local:110)</span>
        </div>
    </div>
</div>

@endsection
