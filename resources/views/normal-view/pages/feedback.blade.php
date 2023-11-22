@extends('normal-view.layout.base')

{{-- @extends('normal-view.layout.dashboard') --}}

@section('title')
    Give Feedback
@endsection

@section('content')
<div class="container mx-auto md:p-10">
    <div class="flex items-center justify-center mt-10">
        <div class="max-w-[700px] bg-white shadow-lg rounded-lg overflow-hidden px-20">
            <div class="p-4">
                @if (session('message'))
                    <div
                        class="bg-green-200 border-l-4 border-r-4 text-center border-green-500 text-green-700 p-4 relative">
                        <span class="block sm:inline text-bold"><i class="fas fa-paper-plane"></i>
                            {{ session('message') }}</span>
                        <button
                            class="absolute top-0 right-0 mt-4 mr-2 text-md text-green-700 hover:text-green-500 focus:outline-none"
                            onclick="this.parentElement.style.display = 'none';">
                            <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path
                                    d="M6.293 6.293a1 1 0 0 1 1.414 0L10 8.586l2.293-2.293a1 1 0 1 1 1.414 1.414L11.414 10l2.293 2.293a1 1 0 0 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 1 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 0-1.414z" />
                            </svg>
                        </button>
                    </div>
                @endif
                <h1 class="text-4xl font-bold mb-4 mt-5 text-indigo-900 text-center">
                    Give Feedback
                </h1>

                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

            </div>
            <form class="px-6 py-4" action="{{ route('feedback.set') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="feedback" class="block text-gray-700 font-bold mb-2">Your Feedback</label>
                    <textarea id="feedback" name="feedback" placeholder="Type your feedback here"
                        class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500"></textarea>
                    @error('feedback')
                        <div class="text-sm text-red-500 italic">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="flex justify-center">
                    <div class="flex items-center">
                        <button type="submit"
                            class="bg-sky-500 hover:bg-sky-600 text-white font-bold py-2 px-10 rounded focus:outline-none focus:shadow-outline"
                            style="border-radius: 20px;">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
