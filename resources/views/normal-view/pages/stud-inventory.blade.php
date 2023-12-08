@extends('normal-view.layout.base')

{{-- @extends('normal-view.layout.dashboard') --}}

@section('title')
    Questionnaire
@endsection
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-body">
                        <form action="{{ route('normal-view.pages.questionnaire', ['studentId' => $studentId]) }}" method="POST" class="mx-auto p-4 bg-white shadow-md rounded-lg">
                            @csrf

                            <!-- Personaldata Fields -->
                            <div class="mb-3">
                                <label for="id_number" class="form-label">ID Number:</label>
                                <input type="text" class="form-control" name="id_number" required>
                            </div>

                            <div class="mb-3">
                                <label for="course" class="form-label">Course:</label>
                                <input type="text" class="form-control" name="course" required>
                            </div>

                            <div class="mb-3">
                                <label for="acad_year" class="form-label">Academic Year:</label>
                                <input type="text" class="form-control" name="acad_year" required>
                            </div>

                            <hr>
                            <h1>PERSONAL DATA</h1>
                            <div class="row">
                                <div class="mb-3 col">
                                    <label class="form-label" for="lname">Last Name:</label>
                                    <input class="form-control" type="text" name="lname" required>

                                </div>

                                <div class="mb-3 col">
                                    <label class="form-label" for="fname">First Name:</label>
                                    <input class="form-control" type="text" name="fname" required>
                                </div>
                                <div class="mb-3 col">
                                    <label class="form-label" for="mname">Middle Name:</label>
                                    <input class="form-control" type="text" name="mname" required>
                                </div>
                                <div class="mb-3 col">
                                    <label class="form-label" for="nick_name">Nickname:</label>
                                    <input class="form-control" type="text" name="nick_name" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 col">
                                    <label class="form-label" for="address">Address:</label>
                                    <input class="form-control" type="text" name="address" required>
                                </div>
                                <div class="mb-3 col">
                                    <label class="form-label" for="age">Age:</label>
                                    <input class="form-control" type="number" name="age" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 col">
                                    <label class="form-label" for="birthplace">Birthplace:</label>
                                    <input class="form-control" type="text" name="birthplace" required>
                                </div>
                                <div class="mb-3 col">
                                    <label class="form-label" for="birthdate">birthdate:</label>
                                    <input class="form-control" type="date" name="birthdate" required>
                                </div>
                                <div class="mb-3 col">
                                    <label class="form-label" for="mobile_no">Mobile no:</label>
                                    <input class="form-control" type="number" name="mobile_no" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 col">
                                    <label class="form-label" for="religion">Religion:</label>
                                    <input class="form-control" type="text" name="religion" required>
                                </div>
                                <div class="mb-3 col">
                                    <label class="form-label" for="citizenship">Citizenship:</label>
                                    <input class="form-control" type="text" name="citizenship" required>
                                </div>
                                <div class="mb-3 col">
                                    <label class="form-label" for="status">Civil Status:</label>
                                    <input class="form-control" type="text" name="status" required>
                                </div>
                            </div>


                            <div class="row">
                                <div class="mb-3 col">
                                    <label class="form-label" for="guardian">Guardian:</label>
                                    <input class="form-control" type="text" name="guardian" required>
                                </div>
                                <div class="mb-3 col">
                                    <label class="form-label" for="contact_no">Contact no:</label>
                                    <input class="form-control" type="text" name="contact_no" required>
                                </div>

                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="guardian_address">Guardian Address:</label>
                                <input class="form-control" type="text" name="guardian_address" required>
                            </div>

                            <!-- Add other Personaldata fields as needed -->

                            <!-- FamilyBackground Fields -->

                            <hr>
                            <h1>FAMILY BACKGROUND</h1>

                            <div class="row">
                                <div class="mb-3 col">
                                    <h1>Parent's Name</h1>
                                </div>
                                <div class="mb-3 col">
                                    <h1>Father</h1>
                                </div>
                                <div class="mb-3 col">
                                    <h1>Mother</h1>
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="mother_name" class="form-label">Name:</label>
                                </div>
                                <div class="mb-3 col">
                                    <input type="text" class="form-control" name="mother_name" required>
                                </div>

                                <div class="mb-3 col">
                                    <input type="text" class="form-control" name="father_name" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="mother_name" class="form-label">Age:</label>
                                </div>
                                <div class="mb-3 col">
                                    <input type="number" class="form-control" name="mother_age" required>
                                </div>

                                <div class="mb-3 col">
                                    <input type="number" class="form-control" name="father_age" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="mother_name" class="form-label">Home Address</label>
                                </div>
                                <div class="mb-3 col">
                                    <input type="text" class="form-control" name="mother_address" required>
                                </div>

                                <div class="mb-3 col">
                                    <input type="text" class="form-control" name="father_address" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="mother_name" class="form-label">Religion</label>
                                </div>
                                <div class="mb-3 col">
                                    <input type="text" class="form-control" name="mother_religion" required>
                                </div>

                                <div class="mb-3 col">
                                    <input type="text" class="form-control" name="father_religion" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="mother_name" class="form-label">Nationality</label>
                                </div>
                                <div class="mb-3 col">
                                    <input type="text" class="form-control" name="mother_nationality" required>
                                </div>

                                <div class="mb-3 col">
                                    <input type="text" class="form-control" name="father_nationality" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="mother_name" class="form-label">Occupation</label>
                                </div>
                                <div class="mb-3 col">
                                    <input type="text" class="form-control" name="mother_occupation" required>
                                </div>

                                <div class="mb-3 col">
                                    <input type="text" class="form-control" name="father_occupation" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="mother_name" class="form-label">Place of Employment</label>
                                </div>
                                <div class="mb-3 col">
                                    <input type="text" class="form-control" name="mother_employmentplace" required>
                                </div>

                                <div class="mb-3 col">
                                    <input type="text" class="form-control" name="father_employmentplace" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col">
                                    Please Check
                                </div>
                                <div class="mb-3 col">
                                    <input type="checkbox" class="form-check-input" id="parent_status" name="parent_status">
                                    <label class="form-check-label" for="parent_status">Legally Married</label>
                                </div>
                                <div class="mb-3 col">
                                    <input type="checkbox" class="form-check-input" id="parent_status" name="parent_status">
                                    <label class="form-check-label" for="parent_status">Separated</label>
                                </div>
                                <div class="mb-3 col">
                                    <input type="checkbox" class="form-check-input" id="parent_status" name="parent_status">
                                    <label class="form-check-label" for="parent_status">Widow</label>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <p>If none, please specify:</p>
                            <input type="text" class="form-control col-md-4" name="parent_status" >
                            </div>
                            <!-- Add other FamilyBackground fields as needed -->

                            <!-- Siblings Fields -->

                            <div class="row">
                                <div class="mb-3 col">
                                    <h1>Name of Brothers & Sisters</h1>
                                </div>
                                <div class="mb-3 col">
                                    <h1>Age</h1>
                                </div>
                                <div class="mb-3 col">
                                    <h1>Educational Attainment</h1>
                                </div>
                                <div class="mb-3 col">
                                    <h1>Civil Status</h1>
                                </div>
                                <div class="mb-3 col">
                                    <h1>Place of Work</h1>
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 col">
                                    <input type="text" class="form-control" name="name">
                                </div>
                                <div class="mb-3 col">
                                    <input type="number" class="form-control" name="age">
                                </div>
                                <div class="mb-3 col">
                                    <input type="text" class="form-control" name="educ_attainment">
                                </div>
                                <div class="mb-3 col">
                                    <input type="text" class="form-control" name="civil_status">
                                </div>
                                <div class="mb-3 col">
                                    <input type="text" class="form-control" name="workplace">
                                </div>
                            </div>

                            <!-- Add other Siblings fields as needed -->

                            <!-- EducationalBackground Fields -->

                            <h1>EDUCATIONAL BACKGROUND</h1>

                            <div class="row">
                                <div class="col mb-3">

                                </div>
                                <div class="col mb-3">
                                    <h6>School Attended</h6>
                                </div>
                                <div class="col mb-3">
                                    <h6>Address</h6>
                                </div>
                                <div class="col mb-3">
                                    <h6>School Year</h6>
                                </div>
                                <div class="col mb-3">
                                    <h6>Honor Received</h6>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col mb-3">
                                    Nursery:
                                </div>
                                <div class="col mb-3">
                                    <input type="text" class="form-control" name="nursery_school">
                                </div>
                                <div class="col mb-3">
                                    <input type="text" class="form-control" name="nursery_address">
                                </div>
                                <div class="col mb-3">
                                    <input type="text" class="form-control" name="nursery_year">
                                </div>
                                <div class="col mb-3">
                                    <input type="text" class="form-control" name="nursery_honors">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    Elementary:
                                </div>
                                <div class="col mb-3">
                                    <input type="text" class="form-control" name="elem_school">
                                </div>
                                <div class="col mb-3">
                                    <input type="text" class="form-control" name="elem_address">
                                </div>
                                <div class="col mb-3">
                                    <input type="text" class="form-control" name="elem_year">
                                </div>
                                <div class="col mb-3">
                                    <input type="text" class="form-control" name="elem_honors">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col mb-3">
                                    Junior HS:
                                </div>
                                <div class="col mb-3">
                                    <input type="text" class="form-control" name="junior_school">
                                </div>
                                <div class="col mb-3">
                                    <input type="text" class="form-control" name="junior_address">
                                </div>
                                <div class="col mb-3">
                                    <input type="text" class="form-control" name="junior_year">
                                </div>
                                <div class="col mb-3">
                                    <input type="text" class="form-control" name="junior_honors">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col mb-3">
                                    Senior HS:
                                </div>
                                <div class="col mb-3">
                                    <input type="text" class="form-control" name="senior_school">
                                </div>
                                <div class="col mb-3">
                                    <input type="text" class="form-control" name="senior_address">
                                </div>
                                <div class="col mb-3">
                                    <input type="text" class="form-control" name="senior_year">
                                </div>
                                <div class="col mb-3">
                                    <input type="text" class="form-control" name="senior_honors">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <p>Scholarship Enjoyed:</p>
                                </div>
                                <div class="col mb-3">
                                    <input type="text" class="form-control" name="scholarship">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <p>Awards Received: </p>
                                </div>
                                <div class="col mb-3">
                                    <input type="text" class="form-control" name="awards">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <p>Societies and Organizations In & Out of School:   </p>
                                </div>
                                <div class="col mb-3">
                                    <input type="text" class="form-control" name="organizations">
                                </div>
                            </div>

                            <!-- Add other EducationalBackground fields as needed -->

                            <hr>
                            <h1>Special Talents: (Please Check)</h1>

                            <div class="row p-3">
                                <div class="col-md-2 mb-3">
                                    <input type="checkbox" class="form-check-input" id="talents" name="talents[]" value="Singing">
                                    <label class="form-check-label" for="talents">Singing</label>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <input type="checkbox" class="form-check-input" id="talents" name="talents[]" value="Dancing">
                                    <label class="form-check-label" for="talents">Dancing</label>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <input type="checkbox" class="form-check-input" id="talents" name="talents[]" value="Painting">
                                    <label class="form-check-label" for="talents">Painting</label>
                                </div>
                                <div class="col-md-1 mb-3">
                                    <label class="form-label" for="talents">Others:</label>

                                </div>
                                <div class="col-md-2 mb-3">
                                    <input type="text" class="form-control" id="talents" name="talents[]">
                                </div>
                            </div>

                            <h1>ATHLETICS:</h1>

                            <div class="row p-3">
                                <div class="col-md-2 mb-3">
                                    <input type="checkbox" class="form-check-input" id="athletics" name="athletics[]" value="Basketball">
                                    <label class="form-check-label" for="athletics">Basketball</label>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <input type="checkbox" class="form-check-input" id="athletics" name="athletics[]" value="Volleyball">
                                    <label class="form-check-label" for="athletics">Volleyball</label>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <input type="checkbox" class="form-check-input" id="athletics" name="athletics[]" value="Badminton">
                                    <label class="form-check-label" for="athletics">Badminton</label>
                                </div>
                                <div class="col-md-1 mb-3">
                                    <label class="form-label" for="athletics[]">Others:</label>

                                </div>
                                <div class="col-md-2 mb-3">
                                    <input type="text" class="form-control" id="athletics" name="athletics[]">
                                </div>
                            </div>

                            <h1>FAVORITE PASTTIME:</h1>

                            <div class="row p-3">
                                <div class="col-md-2 mb-3">
                                    <input type="checkbox" class="form-check-input" id="pasttime" name="pasttime[]" value="Reading">
                                    <label class="form-check-label" for="pasttime">Reading</label>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <input type="checkbox" class="form-check-input" id="pasttime" name="pasttime[]" value="Watching TV">
                                    <label class="form-check-label" for="pasttime">Watching TV</label>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <input type="checkbox" class="form-check-input" id="pasttime" name="pasttime[]" value="Playing Games">
                                    <label class="form-check-label" for="pasttime">Playing Games</label>
                                </div>
                                <div class="col-md-1 mb-3">
                                    <label class="form-label" for="pasttime">Others:</label>

                                </div>
                                <div class="col-md-2 mb-3">
                                    <input type="text" class="form-control" id="pasttime" name="pasttime[]">
                                </div>
                            </div>

                            <h1>FAVORITE SUBJECTS:</h1>

                            <div class="row p-5">
                                <div class="col-md-3 mb-3">
                                    <input type="checkbox" class="form-check-input" id="fav_subject" name="fav_subject[]" value="Mathematics">
                                    <label class="form-check-label" for="fav_subject">Mathematics</label>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <input type="checkbox" class="form-check-input" id="fav_subject" name="fav_subject[]" value="Science">
                                    <label class="form-check-label" for="fav_subject">Science</label>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <input type="checkbox" class="form-check-input" id="fav_subject" name="fav_subject[]" value="English">
                                    <label class="form-check-label" for="fav_subject">English</label>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <input type="checkbox" class="form-check-input" id="fav_subject" name="fav_subject[]" value="History">
                                    <label class="form-check-label" for="fav_subject">History</label>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <input type="checkbox" class="form-check-input" id="fav_subject" name="fav_subject[]" value="Filipino">
                                    <label class="form-check-label" for="fav_subject">Filipino</label>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <input type="checkbox" class="form-check-input" id="fav_subject" name="fav_subject[]" value="Values Education">
                                    <label class="form-check-label" for="fav_subject">Values Education</label>
                                </div>
                                <div class="col-md-1 mb-3">
                                    <label class="form-label" for="fav_subject">Others:</label>

                                </div>
                                <div class="col-md-2 mb-3">
                                    <input type="text" class="form-control" id="fav_subject" name="fav_subject[]">
                                </div>
                            </div>

                            <div>
                                <label class="form-label" for="fav_reason">STATE THE REASON OF CHOOSING YOUR FAVORITE SUBJECT(S): (Explain)</label><br>
                                <textarea name="fav_reason" id="" cols="100" rows="3"></textarea>
                            </div>


                            <h1>PERSONAL TRAITS YOU POSSESS: (Please Check)</h1>

                            <div class="row p-5">
                                <div class="col-md-2 mb-3">
                                    <input type="checkbox" class="form-check-input" id="personal_traits" name="personal_traits[]" value="Friendly">
                                    <label class="form-check-label" for="personal_traits">Friendly</label>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <input type="checkbox" class="form-check-input" id="personal_traits" name="personal_traits[]" value="Easily Troubled">
                                    <label class="form-check-label" for="personal_traits">Easily Troubled</label>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <input type="checkbox" class="form-check-input" id="personal_traits" name="personal_traits[]" value="Happy-go-Lucky">
                                    <label class="form-check-label" for="personal_traits">Happy-go-Lucky</label>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <input type="checkbox" class="form-check-input" id="personal_traits" name="personal_traits[]" value="Anxious">
                                    <label class="form-check-label" for="personal_traits">Anxious</label>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <input type="checkbox" class="form-check-input" id="personal_traits" name="personal_traits[]" value="Stubborn">
                                    <label class="form-check-label" for="personal_traits">Stubborn</label>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <input type="checkbox" class="form-check-input" id="personal_traits" name="personal_traits[]" value="Confident">
                                    <label class="form-check-label" for="personal_traits">Confident</label>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <input type="checkbox" class="form-check-input" id="personal_traits" name="personal_traits[]" value="Affectionate">
                                    <label class="form-check-label" for="personal_traits">Affectionate</label>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <input type="checkbox" class="form-check-input" id="personal_traits" name="personal_traits[]" value="Shy">
                                    <label class="form-check-label" for="personal_traits">Shy</label>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <input type="checkbox" class="form-check-input" id="personal_traits" name="personal_traits[]" value="Practical">
                                    <label class="form-check-label" for="personal_traits">Practical</label>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <input type="checkbox" class="form-check-input" id="personal_traits" name="personal_traits[]" value="Calm">
                                    <label class="form-check-label" for="personal_traits">Calm</label>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <input type="checkbox" class="form-check-input" id="personal_traits" name="personal_traits[]" value="Talkative">
                                    <label class="form-check-label" for="personal_traits">Talkative</label>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <input type="checkbox" class="form-check-input" id="personal_traits" name="personal_traits[]" value="Patient">
                                    <label class="form-check-label" for="personal_traits">Patient</label>
                                </div>
                                <div class="col-md-1 mb-3">
                                    <label class="form-label" for="personal_traits[]">Others:</label>

                                </div>
                                <div class="col-md-2 mb-3">
                                    <input type="text" class="form-control" id="personal_traits[]" name="personal_traits[]">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
