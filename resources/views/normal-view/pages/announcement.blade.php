@extends('normal-view.layout.base')

@section('title')
    Announcement
@endsection

@section('content')
    <div class="container mx-auto p-4">
        <div class="flex items-center justify-center mt-10">
            <div class="max-w-4xl bg-white shadow-lg rounded-lg overflow-hidden p-2">
                {{-- <div class="bg-cover bg-center h-64 p-4" style="background-image: url('/images/bg2.png')"></div> --}}
                <div class="p-5">
                    <p class="md:text-4xl text-center font-extrabold text-indigo-900">
                        ANNOUNCEMENT!!!
                    </p>
                </div>
                <hr class="mb-5">
                @foreach ($announcements as $announcement)
                    <div class="mt-4">
                        <div class="bg-gray-200 rounded-lg shadow-lg p-6 border border-gray-300">

                            <p class="float-right mt-[-15px] mr-[-10px] text-gray-500 text-xs">
                                {{ $announcement->created_at->format('F j, Y - h:i A') }}</p>
                            <h2 class="text-2xl font-semibold text-gray-800 mb-4"><i class="fas fa-bullhorn"></i> |
                                {{ $announcement->title }}</h2>
                            <div class="text-gray-600">-{{ $announcement->description }}</div>
                            <img src="{{ asset('announcements/' . $announcement->image) }}" alt="announcement Image" class="object-cover w-full h-full">
                        </div>

                    </div>
                @endforeach

                @if ($announcements->count() === 0)
                <div class="max-w-2xl mx-auto p-10">
                    <p class="text-center mt-3 text-2xl font-bold text-gray-800">
                        No announcements found yet. Please stay tuned!
                    </p>
                </div>
                @endif
                <div class="my-4">
                    {{ $announcements->links('normal-view.layout.pagination') }}
                </div>
            </div>
        </div>
    </div>
@endsection
