@extends('normal-view.layout.base')

{{-- @extends('normal-view.layout.dashboard') --}}

@section('title')
    Questionnaire
@endsection
@section('content')
    <div class="mt-5">
        <p class="text-xl mb-2 text-center font-bold italic">
            EXIT QUESTIONNAIRE
        </p>
        <form action="{{ route('normal-view.pages.questionnaire', ['studentId' => $studentId]) }}" method="POST"
            class="mx-auto p-4 bg-white shadow-md rounded-lg">
            @csrf
            <p><span class="font-bold">Name: </span> {{ Auth::user()->name }}</p>
            <p><span class="font-bold">Date filled: </span>{{ now()->format('l, F j, Y') }}</p>
            <p><span class="font-bold">ID Number: </span> {{ Auth::user()->id_number }}</p>
            <p><span class="font-bold">Sex: </span> {{ Auth::user()->gender }}</p>
            <div class="flex flex-wrap -mx-2">
                <div class="w-full md:w-1/2 px-2 mb-4 md:mb-0">
                    <p><span class="font-bold">Last Attendance (Semester & AY): </span><input type="text"
                            name="last_semester" id="last_semester" class="w-full px-3 py-2 border rounded-lg">
                        @error('last_semester')
                            <div class="text-sm text-red-500 italic">
                                {{ $message }}
                            </div>
                        @enderror
                    </p>
                </div>

                <div class="w-full md:w-1/2 px-2">
                    <p><span class="font-bold">Course and year: </span><input type="text" name="course_year"
                            id="course_year" class="w-full px-3 py-2 border rounded-lg">
                        @error('course_year')
                            <div class="text-sm text-red-500 italic">
                                {{ $message }}
                            </div>
                        @enderror
                    </p>
                </div>
            </div>

            <hr>

            <p class="text-center"><span class="font-bold">REASONS FOR LEAVING MATER DEI COLLEGE </span> (please check
                as many as applicable): <br>
            <div class="flex flex-wrap -mx-2">
                <div class="w-full md:w-1/2 px-2">
                    <!-- First column of checkboxes -->
                    <label class="block">
                        <input type="checkbox" name="reason[]" value="Financial Reason" class="mr-2">
                        Financial Reason
                    </label>
                    <!-- Add more checkboxes as needed -->
                </div>

                <div class="w-full md:w-1/2 px-2">
                    <!-- Second column of checkboxes -->
                    <label class="block">
                        <input type="checkbox" name="reason[]" value="Parent’s/Financer’s Decision" class="mr-2">
                        Parent’s/Financer’s Decision
                    </label>
                    <!-- Add more checkboxes as needed -->
                </div>
            </div>

            <label class="block">
                <input type="checkbox" name="reason[]" value="Other Reasons" class="mr-2">
                Other Reasons (please specify): <input type="text" name="other_reason"
                    placeholder="Specify other reason" class="border rounded-lg px-3 py-2">
            </label>

            <p><span class="font-bold">RECOMMENDATIONS: </span><input type="text" name="recommendations"
                    id="recommendations" class="w-full px-3 py-2 border rounded-lg">
                @error('recommendations')
                    <div class="text-sm text-red-500 italic">
                        {{ $message }}
                    </div>
                @enderror
            </p>

            <p><span class="font-bold">NAME OF SCHOOL THAT YOU ARE TRANSFERRING TO:</span> <input type="text"
                    name="transfer_school" id="transfer_school" class="w-full px-3 py-2 border rounded-lg">
                @error('transfer_school')
                    <div class="text-sm text-red-500 italic">
                        {{ $message }}
                    </div>
                @enderror
            </p>

            <p><span class="font-bold">ADDRESS OF SCHOOL: </span><input type="text" name="transfer_school_address"
                    id="transfer_school_address" class="w-full px-3 py-2 border rounded-lg mb-4">
                @error('transfer_school_address')
                    <div class="text-sm text-red-500 italic">
                        {{ $message }}
                    </div>
                @enderror
            </p>

            {{-- <u class="text-center text-3xl">{{ Auth::user()->name }}</u>
            <p class="text-center text-lg">(Signature over Printed Name)</p> --}}

            <div class="text-center">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white w-full rounded hover:bg-blue-600">Submit</button>
            </div>
            <div class="text-center mt-1">
                <a href="/admin/transfers"
                    class="btn px-4 py-2 bg-gray-500 text-white w-full rounded hover:bg-gray-600">Back</a>
            </div>
        </form>
    </div>
@endsection

@section('styles')
    <style>
        form {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        label {
            margin-left: 0;

            display: flex;
            align-items: center;
        }

        input[type="checkbox"] {
            margin-right: 5px;

        }
    </style>
@endsection

