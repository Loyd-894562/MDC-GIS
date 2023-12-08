@extends('admin.layout.base')

@section('content-header')
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Generated Codes</h2>
@endsection

@section('content')
    <div class="bg-white rounded-lg shadow-lg p-6">
        <div class="flex justify-between mb-4">
            <span class="text-bold text-2xl">Total Entries: {{ $generated->count() }}</span>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#uploadModal">
                Generate a code
            </button>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-300">
                <thead>
                    <tr>
                        <th class="px-4 py-2 bg-gray-100 border-b border-gray-300">ID No.</th>
                        <th class="px-4 py-2 bg-gray-100 border-b border-gray-300">Form Name</th>
                        <th class="px-4 py-2 bg-gray-100 border-b border-gray-300">Form Code</th>
                        <th class="px-4 py-2 bg-gray-100 border-b border-gray-300">Date</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($generated as $gnrtd)
                        <tr class="hover:bg-gray-100 {{ $loop->iteration % 2 === 0 ? 'bg-gray-100' : '' }}">
                            <td class="px-4 py-2 border-b border-gray-300">{{ $gnrtd->id }}</td>
                            <td class="px-4 py-2 border-b border-gray-300">{{ $gnrtd->form_name }}</td>
                            <td class="px-4 py-2 border-b border-gray-300">{{ $gnrtd->form_code }}</td>
                            <td class="px-4 py-2 border-b border-gray-300">{{ $gnrtd->created_at->format('F j, Y') }} -
                                <span class="italic text-gray-500">{{ $gnrtd->created_at->diffForHumans() }}</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="uploadModalLabel">Upload File</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{ route('generate.code') }}">
                                @csrf

                                <!-- Select form_name -->
                                <label for="form_name">Select Form Name:</label>
                                <select name="form_name" id="form_name">
                                    <option value="Counseling Form">Counseling Form</option>
                                    <option value="Readmission Form">Readmission Form</option>
                                    <option value="Exit Questionnaire for Transfers">Exit Questionnaire for Transfers</option>
                                </select>

                                <br>

                                <!-- Button to generate code -->
                                <button type="submit">Generate Code</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            @if ($generated->count() === 0)
                <p class="text-center mt-3">
                    No one is gnrtding us. Please wait for a while.
                </p>
            @endif
            {{-- <div class="my-4">
                {{ $generated->links('admin.layout.pagination') }}
            </div> --}}

        </div>
    </div>
@endsection
