@extends('admin.layout.base')

@section('content-header')
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Student Inventory</h2>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Update Inventory') }}</div>

                    <div class="card-body">
                        <form action="{{ route('admin.inventory.update', ['id' => $inventory->id])}}" method="PUT">
                            @csrf

                            <!-- Personaldata Fields -->
                            <div class="mb-3">
                                <label for="id_number" class="form-label">ID Number:</label>
                                <input type="text" class="form-control" name="id_number" value="{{$inventory->personaldata->id_number ?? ''}}">
                            </div>

                            <div class="mb-3">
                                <label for="course" class="form-label">Course:</label>
                                <input type="text" class="form-control" name="course" value="{{$inventory->personaldata->course ?? ''}}">
                            </div>

                            <div class="mb-3">
                                <label for="acad_year" class="form-label">Academic Year:</label>
                                <input type="text" class="form-control" name="acad_year" value="{{$inventory->personaldata->acad_year ?? ''}}">
                            </div>

                            <hr>
                            <h1>PERSONAL DATA</h1>
                            <div class="row">
                                <div class="mb-3 col">
                                    <label class="form-label" for="lname">Last Name:</label>
                                    <input class="form-control" type="text" name="lname" value="{{$inventory->personaldata->lname ?? ''}}">

                                </div>

                                <div class="mb-3 col">
                                    <label class="form-label" for="fname">First Name:</label>
                                    <input class="form-control" type="text" name="fname" value="{{$inventory->personaldata->fname ?? ''}}"">
                                </div>
                                <div class="mb-3 col">
                                    <label class="form-label" for="mname">Middle Name:</label>
                                    <input class="form-control" type="text" name="mname" value="{{$inventory->personaldata->mname ?? ''}}">
                                </div>
                                <div class="mb-3 col">
                                    <label class="form-label" for="nick_name">Nickname:</label>
                                    <input class="form-control" type="text" name="nick_name" value="{{$inventory->personaldata->nick_name ?? ''}}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 col">
                                    <label class="form-label" for="address">Address:</label>
                                    <input class="form-control" type="text" name="address" value="{{$inventory->personaldata->address ?? ''}}">
                                </div>
                                <div class="mb-3 col">
                                    <label class="form-label" for="age">Age:</label>
                                    <input class="form-control" type="number" name="age" value="{{$inventory->personaldata->age ?? ''}}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 col">
                                    <label class="form-label" for="birthplace">Birthplace:</label>
                                    <input class="form-control" type="text" name="birthplace" value="{{$inventory->personaldata->birthplace ?? ''}}">
                                </div>
                                <div class="mb-3 col">
                                    <label class="form-label" for="birthdate">birthdate:</label>
                                    <input class="form-control" type="date" name="birthdate" value="{{$inventory->personaldata->birthdate ?? ''}}">
                                </div>
                                <div class="mb-3 col">
                                    <label class="form-label" for="mobile_no">Mobile no:</label>
                                    <input class="form-control" type="number" name="mobile_no" value="{{$inventory->personaldata->mobile_no ?? ''}}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 col">
                                    <label class="form-label" for="religion">Religion:</label>
                                    <input class="form-control" type="text" name="religion" value="{{$inventory->personaldata->religion ?? ''}}">
                                </div>
                                <div class="mb-3 col">
                                    <label class="form-label" for="citizenship">Citizenship:</label>
                                    <input class="form-control" type="text" name="citizenship" value="{{$inventory->personaldata->citizenship ?? ''}}">
                                </div>
                                <div class="mb-3 col">
                                    <label class="form-label" for="status">Civil Status:</label>
                                    <input class="form-control" type="text" name="status" value="{{$inventory->personaldata->status ?? ''}}">
                                </div>
                            </div>


                            <div class="row">
                                <div class="mb-3 col">
                                    <label class="form-label" for="guardian">Guardian:</label>
                                    <input class="form-control" type="text" name="guardian" value="{{$inventory->personaldata->guardian ?? ''}}">
                                </div>
                                <div class="mb-3 col">
                                    <label class="form-label" for="contact_no">Contact no:</label>
                                    <input class="form-control" type="text" name="contact_no" value="{{$inventory->personaldata->contact_no ?? ''}}">
                                </div>

                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="guardian_address">Guardian Address:</label>
                                <input class="form-control" type="text" name="guardian_address" value="{{$inventory->personaldata->guardian_address ?? ''}}">
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
                                    <input type="text" class="form-control" name="mother_name" value="{{$inventory->familybackground->mother_name ?? ''}}">
                                </div>

                                <div class="mb-3 col">
                                    <input type="text" class="form-control" name="father_name" value="{{$inventory->familybackground->father_name ?? ''}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="mother_name" class="form-label">Age:</label>
                                </div>
                                <div class="mb-3 col">
                                    <input type="number" class="form-control" name="mother_age" value="{{$inventory->familybackground->mother_age ?? ''}}">
                                </div>

                                <div class="mb-3 col">
                                    <input type="number" class="form-control" name="father_age" value="{{$inventory->familybackground->father_age ?? ''}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="mother_name" class="form-label">Home Address</label>
                                </div>
                                <div class="mb-3 col">
                                    <input type="text" class="form-control" name="mother_address" value="{{$inventory->familybackground->mother_address ?? ''}}">
                                </div>

                                <div class="mb-3 col">
                                    <input type="text" class="form-control" name="father_address" value="{{$inventory->familybackground->father_address ?? ''}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="mother_name" class="form-label">Religion</label>
                                </div>
                                <div class="mb-3 col">
                                    <input type="text" class="form-control" name="mother_religion" value="{{$inventory->familybackground->mother_religion ?? ''}}">
                                </div>

                                <div class="mb-3 col">
                                    <input type="text" class="form-control" name="father_religion" value="{{$inventory->familybackground->father_religion ?? ''}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="mother_name" class="form-label">Nationality</label>
                                </div>
                                <div class="mb-3 col">
                                    <input type="text" class="form-control" name="mother_nationality" value="{{$inventory->familybackground->mother_nationality ?? ''}}">
                                </div>

                                <div class="mb-3 col">
                                    <input type="text" class="form-control" name="father_nationality" value="{{$inventory->familybackground->father_nationality ?? ''}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="mother_name" class="form-label">Occupation</label>
                                </div>
                                <div class="mb-3 col">
                                    <input type="text" class="form-control" name="mother_occupation" value="{{$inventory->familybackground->mother_occupation ?? ''}}">
                                </div>

                                <div class="mb-3 col">
                                    <input type="text" class="form-control" name="father_occupation" value="{{$inventory->familybackground->father_occupation ?? ''}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="mother_name" class="form-label">Place of Employment</label>
                                </div>
                                <div class="mb-3 col">
                                    <input type="text" class="form-control" name="mother_employmentplace" value="{{$inventory->familybackground->mother_employmentplace ?? ''}}">
                                </div>

                                <div class="mb-3 col">
                                    <input type="text" class="form-control" name="father_employmentplace" value="{{$inventory->familybackground->father_employmentplace ?? ''}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col">
                                    Please Check
                                </div>
                                <div class="mb-3 col">
                                    <input type="checkbox" class="form-check-input" id="legally_married" name="parent_status"
                                           @if($inventory->parent_status === 'Legally Married') checked @endif>
                                    <label class="form-check-label" for="legally_married">Legally Married</label>
                                </div>
                                <div class="mb-3 col">
                                    <input type="checkbox" class="form-check-input" id="separated" name="parent_status"
                                           @if($inventory->parent_status === 'Separated') checked @endif>
                                    <label class="form-check-label" for="separated">Separated</label>
                                </div>
                                <div class="mb-3 col">
                                    <input type="checkbox" class="form-check-input" id="widow" name="parent_status"
                                           @if($inventory->parent_status === 'Widow') checked @endif>
                                    <label class="form-check-label" for="widow">Widow</label>
                                </div>

                            </div>

                            <div class="row mb-3">
                                <p>If none, please specify:</p>
                            <input type="text" class="form-control col-md-4" name="parent_status" value="{{$inventory->familybackground->parent_status ?? ''}}">
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
                                    <input type="text" class="form-control" name="name" value="{{$inventory->siblings->name ?? ''}}">
                                </div>
                                <div class="mb-3 col">
                                    <input type="number" class="form-control" name="age" value="{{$inventory->siblings->age ?? ''}}">
                                </div>
                                <div class="mb-3 col">
                                    <input type="text" class="form-control" name="educ_attainment" value="{{$inventory->siblings->educ_attainment ?? ''}}">
                                </div>
                                <div class="mb-3 col">
                                    <input type="text" class="form-control" name="civil_status" value="{{$inventory->siblings->civil_status ?? ''}}">
                                </div>
                                <div class="mb-3 col">
                                    <input type="text" class="form-control" name="workplace" value="{{$inventory->siblings->workplace ?? ''}}">
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
                                    <input type="text" class="form-control" name="nursery_school" value="{{$inventory->educationalBackground->nursery_school ?? ''}}">
                                </div>
                                <div class="col mb-3">
                                    <input type="text" class="form-control" name="nursery_address" value="{{$inventory->educationalBackground->nursery_address ?? ''}}">
                                </div>
                                <div class="col mb-3">
                                    <input type="text" class="form-control" name="nursery_year" value="{{$inventory->educationalBackground->nursery_year ?? ''}}">
                                </div>
                                <div class="col mb-3">
                                    <input type="text" class="form-control" name="nursery_honors" value="{{$inventory->educationalBackground->nursery_honors ?? ''}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    Elementary:
                                </div>
                                <div class="col mb-3">
                                    <input type="text" class="form-control" name="elem_school" value="{{$inventory->educationalBackground->elem_school ?? ''}}">
                                </div>
                                <div class="col mb-3">
                                    <input type="text" class="form-control" name="elem_address" value="{{$inventory->educationalBackground->elem_address ?? ''}}">
                                </div>
                                <div class="col mb-3">
                                    <input type="text" class="form-control" name="elem_year" value="{{$inventory->educationalBackground->nursery_year ?? ''}}">
                                </div>
                                <div class="col mb-3">
                                    <input type="text" class="form-control" name="elem_honors" value="{{$inventory->educationalBackground->elem_honors ?? ''}}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col mb-3">
                                    Junior HS:
                                </div>
                                <div class="col mb-3">
                                    <input type="text" class="form-control" name="junior_school" value="{{$inventory->educationalBackground->junior_school ?? ''}}">
                                </div>
                                <div class="col mb-3">
                                    <input type="text" class="form-control" name="junior_address" value="{{$inventory->educationalBackground->junior_address ?? ''}}">
                                </div>
                                <div class="col mb-3">
                                    <input type="text" class="form-control" name="junior_year" value="{{$inventory->educationalBackground->junior_year ?? ''}}">
                                </div>
                                <div class="col mb-3">
                                    <input type="text" class="form-control" name="junior_honors" value="{{$inventory->educationalBackground->junior_honors ?? ''}}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col mb-3">
                                    Senior HS:
                                </div>
                                <div class="col mb-3">
                                    <input type="text" class="form-control" name="senior_school" value="{{$inventory->educationalBackground->senior_school ?? ''}}">
                                </div>
                                <div class="col mb-3">
                                    <input type="text" class="form-control" name="senior_address" value="{{$inventory->educationalBackground->senior_address ?? ''}}">
                                </div>
                                <div class="col mb-3">
                                    <input type="text" class="form-control" name="senior_year" value="{{$inventory->educationalBackground->senior_year ?? ''}}">
                                </div>
                                <div class="col mb-3">
                                    <input type="text" class="form-control" name="senior_honors" value="{{$inventory->educationalBackground->senior_honors ?? ''}}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <p>Scholarship Enjoyed:</p>
                                </div>
                                <div class="col mb-3">
                                    <input type="text" class="form-control" name="scholarship" value="{{$inventory->educationalBackground->scholarship ?? ''}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <p>Awards Received: </p>
                                </div>
                                <div class="col mb-3">
                                    <input type="text" class="form-control" name="awards" value="{{$inventory->educationalBackground->awards ?? ''}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <p>Societies and Organizations In & Out of School:   </p>
                                </div>
                                <div class="col mb-3">
                                    <input type="text" class="form-control" name="organizations" value="{{$inventory->educationalBackground->organizations ?? ''}}">
                                </div>
                            </div>

                            <!-- Add other EducationalBackground fields as needed -->

                            <hr>
                            <h1>Special Talents: (Please Check)</h1>

                            <div class="row p-3">

                                <div class="col-md-2 mb-3">
                                    <input type="checkbox" class="form-check-input" id="talents_singing" name="talents[]" value="Singing"
                                           @if(in_array('Singing', explode(',', $inventory->educationalBackground->talents))) checked @endif>
                                    <label class="form-check-label" for="talents_singing">Singing</label>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <input type="checkbox" class="form-check-input" id="talents_dancing" name="talents[]" value="Dancing"
                                           @if(in_array('Dancing', explode(',', $inventory->educationalBackground->talents))) checked @endif>
                                    <label class="form-check-label" for="talents_dancing">Dancing</label>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <input type="checkbox" class="form-check-input" id="talents_painting" name="talents[]" value="Painting"
                                           @if(in_array('Painting', explode(',', $inventory->educationalBackground->talents))) checked @endif>
                                    <label class="form-check-label" for="talents_painting">Painting</label>
                                </div>


                                <div class="col-md-1 mb-3">
                                    <label class="form-label" for="talents">Others:</label>

                                </div>
                                <div class="col-md-2 mb-3">
                                    <input type="text" class="form-control" id="talents" name="talents[]" >
                                </div>
                            </div>

                            <h1>ATHLETICS:</h1>

                            <div class="row p-3">
                                <div class="col-md-2 mb-3">
                                    <input type="checkbox" class="form-check-input" id="athletics_basketball" name="athletics[]" value="Basketball"
                                           @if(in_array('Basketball', explode(',', $inventory->educationalBackground->athletics))) checked @endif>
                                    <label class="form-check-label" for="athletics_basketball">Basketball</label>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <input type="checkbox" class="form-check-input" id="athletics_volleyball" name="athletics[]" value="Volleyball"
                                           @if(in_array('Volleyball', explode(',', $inventory->educationalBackground->athletics))) checked @endif>
                                    <label class="form-check-label" for="athletics_volleyball">Volleyball</label>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <input type="checkbox" class="form-check-input" id="athletics_badminton" name="athletics[]" value="Badminton"
                                           @if(in_array('Badminton', explode(',', $inventory->educationalBackground->athletics))) checked @endif>
                                    <label class="form-check-label" for="athletics_badminton">Badminton</label>
                                </div>

                                <div class="col-md-1 mb-3">
                                    <label class="form-label" for="athletics[]">Others:</label>

                                </div>
                                <div class="col-md-2 mb-3">
                                    <input type="text" class="form-control" id="athletics" name="athletics[]" >
                                </div>
                            </div>

                            <h1>FAVORITE PASTTIME:</h1>

                            <div class="row p-3">
                                <div class="col-md-2 mb-3">
                                    <input type="checkbox" class="form-check-input" id="pasttime_reading" name="pasttime[]" value="Reading"
                                           @if(in_array('Reading', explode(',', $inventory->educationalBackground->pasttime))) checked @endif>
                                    <label class="form-check-label" for="pasttime_reading">Reading</label>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <input type="checkbox" class="form-check-input" id="pasttime_watching_tv" name="pasttime[]" value="Watching TV"
                                           @if(in_array('Watching TV', explode(',', $inventory->educationalBackground->pasttime))) checked @endif>
                                    <label class="form-check-label" for="pasttime_watching_tv">Watching TV</label>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <input type="checkbox" class="form-check-input" id="pasttime_playing_games" name="pasttime[]" value="Playing Games"
                                           @if(in_array('Playing Games', explode(',', $inventory->educationalBackground->pasttime))) checked @endif>
                                    <label class="form-check-label" for="pasttime_playing_games">Playing Games</label>
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
                                    <input type="checkbox" class="form-check-input" id="fav_subject_mathematics" name="fav_subject[]" value="Mathematics"
                                           @if(in_array('Mathematics', explode(',', $inventory->educationalBackground->fav_subject))) checked @endif>
                                    <label class="form-check-label" for="fav_subject_mathematics">Mathematics</label>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <input type="checkbox" class="form-check-input" id="fav_subject_science" name="fav_subject[]" value="Science"
                                           @if(in_array('Science', explode(',', $inventory->educationalBackground->fav_subject))) checked @endif>
                                    <label class="form-check-label" for="fav_subject_science">Science</label>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <input type="checkbox" class="form-check-input" id="fav_subject_english" name="fav_subject[]" value="English"
                                           @if(in_array('English', explode(',', $inventory->educationalBackground->fav_subject))) checked @endif>
                                    <label class="form-check-label" for="fav_subject_english">English</label>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <input type="checkbox" class="form-check-input" id="fav_subject_history" name="fav_subject[]" value="History"
                                           @if(in_array('History', explode(',', $inventory->educationalBackground->fav_subject))) checked @endif>
                                    <label class="form-check-label" for="fav_subject_history">History</label>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <input type="checkbox" class="form-check-input" id="fav_subject_filipino" name="fav_subject[]" value="Filipino"
                                           @if(in_array('Filipino', explode(',', $inventory->educationalBackground->fav_subject))) checked @endif>
                                    <label class="form-check-label" for="fav_subject_filipino">Filipino</label>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <input type="checkbox" class="form-check-input" id="fav_subject_values_education" name="fav_subject[]" value="Values Education"
                                           @if(in_array('Values Education', explode(',', $inventory->educationalBackground->fav_subject))) checked @endif>
                                    <label class="form-check-label" for="fav_subject_values_education">Values Education</label>
                                </div>

                                <div class="col-md-1 mb-3">
                                    <label class="form-label" for="fav_subject">Others:</label>

                                </div>
                                <div class="col-md-2 mb-3">
                                    <input type="text" class="form-control" id="fav_subject" name="fav_subject[]" >
                                </div>
                            </div>

                            <div>
                                <label class="form-label" for="fav_reason">STATE THE REASON OF CHOOSING YOUR FAVORITE SUBJECT(S): (Explain)</label><br>
                                <textarea name="fav_reason" id="" cols="100" rows="3">{{$inventory->educationalBackground->fav_reason}}</textarea>
                            </div>


                            <h1>PERSONAL TRAITS YOU POSSESS: (Please Check)</h1>

                            <div class="row p-5">
                                <div class="col-md-2 mb-3">
                                    <input type="checkbox" class="form-check-input" id="personal_traits_friendly" name="personal_traits[]" value="Friendly"
                                           @if(in_array('Friendly', explode(',', $inventory->educationalBackground->personal_traits))) checked @endif>
                                    <label class="form-check-label" for="personal_traits_friendly">Friendly</label>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <input type="checkbox" class="form-check-input" id="personal_traits_easily_troubled" name="personal_traits[]" value="Easily Troubled"
                                           @if(in_array('Easily Troubled', explode(',', $inventory->educationalBackground->personal_traits))) checked @endif>
                                    <label class="form-check-label" for="personal_traits_easily_troubled">Easily Troubled</label>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <input type="checkbox" class="form-check-input" id="personal_traits_happy_go_lucky" name="personal_traits[]" value="Happy-go-Lucky"
                                           @if(in_array('Happy-go-Lucky', explode(',', $inventory->educationalBackground->personal_traits))) checked @endif>
                                    <label class="form-check-label" for="personal_traits_happy_go_lucky">Happy-go-Lucky</label>
                                </div>


                                <div class="col-md-2 mb-3">
                                    <input type="checkbox" class="form-check-input" id="personal_traits_anxious" name="personal_traits[]" value="Anxious"
                                           @if(in_array('Anxious', explode(',', $inventory->educationalBackground->personal_traits))) checked @endif>
                                    <label class="form-check-label" for="personal_traits_anxious">Anxious</label>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <input type="checkbox" class="form-check-input" id="personal_traits_stubborn" name="personal_traits[]" value="Stubborn"
                                           @if(in_array('Stubborn', explode(',', $inventory->educationalBackground->personal_traits))) checked @endif>
                                    <label class="form-check-label" for="personal_traits_stubborn">Stubborn</label>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <input type="checkbox" class="form-check-input" id="personal_traits_confident" name="personal_traits[]" value="Confident"
                                           @if(in_array('Confident', explode(',', $inventory->educationalBackground->personal_traits))) checked @endif>
                                    <label class="form-check-label" for="personal_traits_confident">Confident</label>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <input type="checkbox" class="form-check-input" id="personal_traits_affectionate" name="personal_traits[]" value="Affectionate"
                                           @if(in_array('Affectionate', explode(',', $inventory->educationalBackground->personal_traits))) checked @endif>
                                    <label class="form-check-label" for="personal_traits_affectionate">Affectionate</label>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <input type="checkbox" class="form-check-input" id="personal_traits_shy" name="personal_traits[]" value="Shy"
                                           @if(in_array('Shy', explode(',', $inventory->educationalBackground->personal_traits))) checked @endif>
                                    <label class="form-check-label" for="personal_traits_shy">Shy</label>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <input type="checkbox" class="form-check-input" id="personal_traits_practical" name="personal_traits[]" value="Practical"
                                           @if(in_array('Practical', explode(',', $inventory->educationalBackground->personal_traits))) checked @endif>
                                    <label class="form-check-label" for="personal_traits_practical">Practical</label>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <input type="checkbox" class="form-check-input" id="personal_traits_calm" name="personal_traits[]" value="Calm"
                                           @if(in_array('Calm', explode(',', $inventory->educationalBackground->personal_traits))) checked @endif>
                                    <label class="form-check-label" for="personal_traits_calm">Calm</label>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <input type="checkbox" class="form-check-input" id="personal_traits_talkative" name="personal_traits[]" value="Talkative"
                                           @if(in_array('Talkative', explode(',', $inventory->educationalBackground->personal_traits))) checked @endif>
                                    <label class="form-check-label" for="personal_traits_talkative">Talkative</label>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <input type="checkbox" class="form-check-input" id="personal_traits_patient" name="personal_traits[]" value="Patient"
                                           @if(in_array('Patient', explode(',', $inventory->educationalBackground->personal_traits))) checked @endif>
                                    <label class="form-check-label" for="personal_traits_patient">Patient</label>
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
