@extends('normal-view.layout.base')

{{-- @extends('normal-view.layout.dashboard') --}}

@section('title')
    Check ID number
@endsection

@section('content')
    <div class="container mx-auto md:p-10">
        <div class="flex items-center justify-center mt-10">
            <div class="max-w-[700px] bg-white shadow-lg rounded-lg overflow-hidden px-20">
                <div class="p-4">
                    @if (session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                            <span class="block sm:inline">{{ session('error') }}</span>
                            <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3"
                                onclick="this.parentElement.style.display = 'none';">
                                <svg class="h-6 w-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path
                                        d="M6.293 6.293a1 1 0 0 1 1.414 0L10 8.586l2.293-2.293a1 1 0 1 1 1.414 1.414L11.414 10l2.293 2.293a1 1 0 0 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 1 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 0-1.414z" />
                                </svg>
                            </button>
                        </div>
                    @endif
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

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                </div>
                <form action="{{ route('appointment.checkStudent') }}" method="post">
                    @csrf
                    <label for="id_number">Student ID:</label>
                    <input type="text" name="id_number" required>
                    <button type="submit">Enter</button>
                </form>
            </div>
        </div>
    </div>
@endsection
