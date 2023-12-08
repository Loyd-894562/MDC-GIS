@extends('normal-view.layout.base')

{{-- @extends('normal-view.layout.dashboard') --}}

@section('title')
    Questionnaire
@endsection

@section('content')
<div class="mt-5">
    <form action="{{ route('normal-view.pages.questionnaire', ['studentId' => $studentId]) }}" method="POST" class="mx-auto p-4 bg-white shadow-md rounded-lg">
        @csrf

        <p class="text-xl mb-2 text-center font-bold italic">RE-ADMISSION FORM</p>

        <p class="mb-4">To the teacher:</p>
        <p>This is to inform that Mr./Ms.
            <input type="text" name="student_name" id="student_name" placeholder="Enter name of student">
            enrolled in
            <input type="text" name="course_year" id="course_year" placeholder="Enter course and year"> has incurred the following absences:
        </p>

        @error('course_year')
            <div class="text-sm text-red-500 italic">
                {{ $message }}
            </div>
        @enderror

        @error('student_name')
            <div class="text-sm text-red-500 italic">
                {{ $message }}
            </div>
        @enderror

        <hr>

        <!-- Repeatable section -->
        @for ($i = 1; $i <= 3; $i++)
            <div class="flex">
                <div class="flex-grow mr-4">
                    <label for="date{{ $i }}" class="block text-gray-700 font-semibold mb-2">Date</label>
                    <input type="text" name="date{{ $i }}" id="date{{ $i }}" class="w-full px-3 py-2 border rounded-lg"
                        placeholder="Enter Date">
                    @error("date{$i}")
                        <div class="text-sm text-red-500 italic">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="flex-grow mr-4">
                    <label for="reason{{ $i }}" class="block text-gray-700 font-semibold mb-2">Reason</label>
                    <input type="text" name="reason{{ $i }}" id="reason{{ $i }}" class="w-full px-3 py-2 border rounded-lg"
                        placeholder="Enter Reason">
                    @error("reason{$i}")
                        <div class="text-sm text-red-500 italic">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="flex-grow">
                    <label for="subject_affected{{ $i }}" class="block text-gray-700 font-semibold mb-2">Contact number</label>
                    <input type="text" name="subject_affected{{ $i }}" id="subject_affected{{ $i }}"
                        class="w-full px-3 py-2 border rounded-lg" placeholder="Enter subject">
                    @error("subject_affected{$i}")
                        <div class="text-sm text-red-500 italic">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        @endfor

        <p class="text-center mt-4">Because of the reasons presented, the student is hereby granted:
        </p>
        <div class="flex justify-center mt-2">
            <input type="checkbox" id="granted" name="granted" value="1" class="mr-2">RE-ADMISSION
            <input type="checkbox" id="granted" name="granted" value="0" class="ml-4">NON-RE-ADMISSION TO CLASSES
        </div>

        <div class="flex">
            <div class="flex-grow mr-4">
                <label for="guidance_sig" class="block text-gray-700 font-semibold mb-2">Guidance Counselor</label>
                <input type="text" name="guidance_sig" id="guidance_sig" class="w-full px-3 py-2 border rounded-lg"
                    placeholder="Enter Guidance Counselor">
                @error('guidance_sig')
                    <div class="text-sm text-red-500 italic">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="flex-grow">
                <label for="osad_sig" class="block text-gray-700 font-semibold mb-2">OSAD Coordinator</label>
                <input type="text" name="osad_sig" id="osad_sig" class="w-full px-3 py-2 border rounded-lg"
                    placeholder="Enter OSAD Coordinator">
                @error('osad_sig')
                    <div class="text-sm text-red-500 italic">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="text-center mt-4">
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white w-full rounded hover:bg-blue-600">Submit</button>
        </div>

        <div class="text-center mt-1">
            <a href="/questionnaires" class="btn px-4 py-2 bg-gray-500 text-white w-full rounded hover:bg-gray-600">Back</a>
        </div>
    </form>
</div>

@endsection
