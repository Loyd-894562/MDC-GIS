@extends('normal-view.layout.base')

@section('title')
    About Us
@endsection

@section('content')
<h1 class="text-4xl font-bold text-2xl mb-4 text-indigo-900 text-center">
                    About Us
                </h1>

    <div class="container mx-auto p-4">
        <div class="flex flex-col items-center justify-center mt-10">

            <div class="max-w-[900px] rounded-lg overflow-hidden">

                
                <div class="card mb-4 sm:flex">
                    <div class="p-4 bg-white bg-opacity-75 rounded-md">
                        <h1 class="font-bold text-2xl text-start mb-2 sm:mb-0 sm:mr-4">VISION</h1>
                        <p class="text-justify text-l">
                            The Guidance Office of Mater Dei College is an office where a helping relationship exists between
                            students, counsellor and stakeholders in order to sustain and enhance a harmonious relationship that
                            develops positive social growth.
                        </p>
                    </div>
                </div>

                <div class="card mb-4 sm:flex">
                    <div class="p-4 bg-white bg-opacity-75 rounded-md">
                        <h1 class="font-bold text-2xl text-end mb-2 sm:mb-0 sm:mr-4">MISSION</h1>
                        <p class="text-justify text-l">
                            The Guidance Office develops students’ self-awareness thereby promoting understanding of self and
                            others through counselling programs and other guidance service that promote positive students’
                            growth.
                        </p>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="p-4 bg-white bg-opacity-75 rounded-md">
                        <h1 class="font-bold text-2xl mb-2">GOALS</h1>
                        <p class="text-justify text-l">
                            The Guidance Services aims to: <br>
                            1. Help students in formulating goals for self-direction; <br>
                            2. Develop and harness their potentials for social interactions; <br>
                            3. Assist them in developing their capacities and discovering their potentialities to achieve
                            self-realization; <br>
                            4. Formulate and identify their concept of self for better realization of their hopes and
                            aspirations; and <br>
                            5. Conduct activities that enable them to attain total human formation.
                        </p>
                    </div>
                </div>

                <div class="flex">
                    <div class="card mb-4 flex-1">
                        <img src="{{ asset('images/about1.jpg') }}" alt="" class="img-fluid w-full h-auto">
                    </div>

                    <div class="card mb-4 flex-1">
                        <img src="{{ asset('images/about2.jpg') }}" alt="" class="img-fluid w-full h-auto">
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
