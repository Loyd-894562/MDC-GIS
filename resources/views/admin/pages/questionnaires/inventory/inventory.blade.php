@extends('admin.layout.base')

@section('content-header')
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Student Inventory</h2>
@endsection

@section('content')
    @if (session('message'))
        <div class="bg-green-200 border-l-4 border-r-4 text-center border-green-500 text-green-700 p-4 relative">
            <span class="block sm:inline text-bold"><i class="fas fa-bullhorn"></i> {{ session('message') }}</span>
            <button class="absolute top-0 right-0 mt-4 mr-2 text-md text-green-700 hover:text-green-500 focus:outline-none"
                    onclick="this.parentElement.style.display = 'none';">
                <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path
                        d="M6.293 6.293a1 1 0 0 1 1.414 0L10 8.586l2.293-2.293a1 1 0 1 1 1.414 1.414L11.414 10l2.293 2.293a1 1 0 0 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 1 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 0-1.414z"/>
                </svg>
            </button>
        </div>
    @endif

    <div class="bg-white rounded-lg shadow-lg p-6">
        <div class="flex justify-between mb-4">
            <span class="text-bold text-2xl">Total Entries: {{ $inventory->count() }}</span>

            <form action="{{ route('admin.inventory') }}" method="GET">
                <div class="flex items-center space-x-4">
                    <label for="search" class="text-sm font-medium text-gray-600"></label>
                    <input type="text" id="search" name="search"
                           class="border border-gray-300 px-2 py-1 rounded-md focus:outline-none focus:ring focus:border-blue-500"
                           placeholder="Enter name" value="{{ request('search') }}">
                    <button type="submit"
                            class="bg-blue-600 text-white px-4 py-1 rounded-md hover:bg-blue-700 focus:outline-none focus:ring focus:border-blue-500">
                        Search
                    </button>
                </div>
            </form>

            <a href="/admin/inventory/create"
               class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Add Form
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-300">
                <thead>
                <tr>
                    <th class="px-4 py-2 bg-gray-100 border-b border-gray-300">ID No.</th>
                    <th class="px-4 py-2 bg-gray-100 border-b border-gray-300">Student name</th>
                    <th class="px-4 py-2 bg-gray-100 border-b border-gray-300">Course and Year</th>
                    <th class="px-4 py-2 bg-gray-100 border-b border-gray-300">Date</th>
                    <th class="px-4 py-2 bg-gray-100 border-b border-gray-300">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($inventory as $nvntry)
                    <tr class="hover:bg-gray-100 {{ $loop->iteration % 2 === 0 ? 'bg-gray-100' : '' }}">
                        <td class="px-4 py-2 border-b border-gray-300">{{ $nvntry->id }}</td>
                        <td class="px-4 py-2 border-b border-gray-300">{{ $nvntry->personaldata->fname }} {{ $nvntry->personaldata->lname }}</td>
                        <td class="px-4 py-2 border-b border-gray-300">{{ $nvntry->personaldata->course }}</td>
                        <td class="px-4 py-2 border-b border-gray-300">{{ $nvntry->created_at->format('F j, Y') }}</td>
                        <td class="px-4 py-2 border-b border-gray-300">
                            <div class="flex justify-between items-center space-x-2">
                                <a href="{{ route('admin.inventory.update', $nvntry->id) }}"
                                   class="text-blue-600 hover:underline">Update</a>
                                <button type="submit"
                                        class="text-red-700 hover:underline"
                                        data-toggle="modal" data-target="#deleteModal">Delete
                                </button>
                                <a href="{{ route('admin.inventory.pdf', $nvntry->id) }}"
                                   class="text-green-600 hover:underline">Download</a>
                                <button class="text-blue-600 hover:underline"
                                        onclick="printinventory({{ $nvntry->id }})">Print
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            @if ($inventory->count() === 0)
                <p class="text-center mt-3">
                    No inventory found. Please add one!
                </p>
            @endif

            <div class="my-4">
                {{ $inventory->links('admin.layout.pagination') }}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function printinventory(inventoryId) {
            const printUrl = "{{ route('admin.inventory.print', ':id') }}".replace(':id', inventoryId);
            const printWindow = window.open(printUrl, '_blank');
            printWindow.onload = function () {
                printWindow.print();
            };
        }
    </script>
@endsection
