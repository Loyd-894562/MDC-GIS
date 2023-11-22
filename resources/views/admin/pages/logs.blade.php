@extends('admin.layout.base')

@section('content-header')
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Logs</h2>
@endsection

@section('content')
    <div class="bg-white rounded-lg shadow-lg p-6">
        <div class="flex justify-between mb-4">
            <span class="text-bold text-2xl">Total Entries: {{ $logs->count() }}</span>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-300">
                <thead>
                    <tr>
                        <th class="px-4 py-2 bg-gray-100 border-b border-gray-300">ID</th>
                        <th class="px-4 py-2 bg-gray-100 border-b border-gray-300">Event</th>
                        <th class="px-4 py-2 bg-gray-100 border-b border-gray-300">Description</th>
                        <th class="px-4 py-2 bg-gray-100 border-b border-gray-300">Causer</th>
                        <th class="px-4 py-2 bg-gray-100 border-b border-gray-300">Date</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($logs as $log)
                        <tr class="hover:bg-gray-100 {{ $loop->iteration % 2 === 0 ? 'bg-gray-100' : '' }}">
                            <td class="px-4 py-2 border-b border-gray-300">{{ $log->id }}</td>
                            <td class="px-4 py-2 border-b border-gray-300">{{ $log->event }}</td>
                            <td class="px-4 py-2 border-b border-gray-300">{{ $log->description }}</td>
                            <td class="px-4 py-2 border-b border-gray-300">{{ $log->causer->name ?? "Student" }}</td>
                            <td class="px-4 py-2 border-b border-gray-300">{{ $log->created_at->format('F j, Y') }} -
                                <span class="italic text-gray-500">{{ $log->created_at->diffForHumans() }}</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if ($logs->count() === 0)
                <p class="text-center mt-3">
                    No one is loging us. Please wait for a while.
                </p>
            @endif
            {{-- <div class="my-4">
                {{ $logs->links('admin.layout.pagination') }}
            </div> --}}
        </div>
    </div>
@endsection
