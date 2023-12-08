<?php

namespace App\Http\Controllers\Normal_View;

use App\Models\User;
use App\Models\Formcode;
use App\Models\Siblings;
use App\Models\Readmission;
use App\Models\Personaldata;
use Illuminate\Http\Request;
use App\Models\Questionnaire;
use App\Models\CounselingForm;
use App\Models\FamilyBackground;
use App\Models\StudentInventory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\EducationalBackground;

class QuestionnaireController extends Controller
{
    public function fillQuestionnaire($studentId)
    {
        return view('normal-view.pages.questionnaire', ['studentId' => $studentId]);
    }

    public function index(){
        return view('normal-view.pages.check-questionnaire');
    }
    public function checkQuestionnaire(Request $request)
    {
        $studentId = $request->input('id_number');
        $formCode = $request->input('form_code');

        $student = User::where('id_number', $studentId)->first();
        $form = Formcode::where('form_code', $formCode)->first();

        if ($student && $form) {
            $formName = $form->form_name;

            if ($formName === "Readmission Form") {
                return view('normal-view.pages.readmission', ['studentId' => $studentId]);

            } elseif($formName === "Exit Questionnaire for Transfers") {
                return view('normal-view.pages.transfer', ['studentId' => $studentId]);
            } elseif($formName === "Student Inventory") {
                return view('normal-view.pages.stud-inventory', ['studentId' => $studentId]);
            }
        } else {
            return back()->with('error', 'Wrong Credentials. Please make sure you entered the right data');
        }
    }

    public function readmissionstore(Request $request)
    {
        $request->validate([
            'student_name' => 'required|string',
            'course_year' => 'required|string',
            'date1' => 'nullable|string',
            'reason1' => 'nullable|string',
            'subject_affected1' => 'nullable|string',
            'date2' => 'nullable|string',
            'reason2' => 'nullable|string',
            'subject_affected2' => 'nullable|string',
            'date3' => 'nullable|string',
            'reason3' => 'nullable|string',
            'subject_affected3' => 'nullable|string',
            'granted' => 'required',
            'guidance_sig' => 'required|string',
            'osad_sig' => 'required|string',

        ]);

        Readmission::create([
            'user_id' =>  Auth::id(),
            'student_name' => $request->input('student_name'),
            'course_year' => $request->input('course_year'),
            'date1' => $request->input('date1'),
            'reason1' => $request->input('reason1'),
            'subject_affected1' => $request->input('subject_affected1'),
            'date2' => $request->input('date2'),
            'reason2' => $request->input('reason2'),
            'subject_affected2' => $request->input('subject_affected2'),
            'date3' => $request->input('date3'),
            'reason3' => $request->input('reason3'),
            'subject_affected3' => $request->input('subject_affected3'),
            'granted' => $request->input('granted'),
            'guidance_sig' => $request->input('guidance_sig'),
            'osad_sig' => $request->input('osad_sig'),


        ]);

        return redirect('/success')->with('message', 'New readmission Added');
    }

    public function success(){
        return view('normal-view.pages.success');
    }

    public function transferstore(Request $request)
    {
        $request->validate([
            'last_semester' => 'required|string',
            'course_year' => 'required|string',
            'reason' => 'required|array',
            'other_reason' => 'required|string',
            'recommendations' => 'required|string',
            'transfer_school' => 'nullable|string',
            'transfer_school_address' => 'nullable|string',

        ]);

        $reason = implode(', ', $request->input('reason'));
        Questionnaire::create([
            'user_id' => Auth::id(),
            'last_semester' => $request->input('last_semester'),
            'course_year' => $request->input('course_year'),
            'reason' => $reason,
            'other_reason' => $request->input('other_reason'),
            'recommendations' => $request->input('recommendations'),
            'transfer_school' => $request->input('transfer_school'),
            'transfer_school_address' => $request->input('transfer_school_address'),
        ]);

        return redirect('/success')->with('message', 'New data Added');
    }

    public function inventoryStore(Request $request)
    {
        try{

        $request->validate([
            'course' => 'required|string',
            'id_number' => 'required|string',
            'acad_year' => 'required|string',
            'lname' => 'required|string',
            'fname' => 'required|string',
            'mname' => 'required|string',
            'nick_name' => 'required|string',
            'address' => 'required|string',
            'status' => 'required|string',
            'age' => 'required|string',
            'birthplace' => 'required|string',
            'mobile_no' => 'required|string',
            'religion' => 'required|string',
            'citizenship' => 'required|string',
            'birthdate' => 'required|string',
            'guardian' => 'required|string',
            'contact_no' => 'required|string',
            'guardian_address' => 'required|string',

            'mother_name' => 'required|string',
            'father_name' => 'required|string',
            'mother_age' => 'required|string',
            'father_age' => 'required|string',
            'mother_address' => 'required|string',
            'father_address' => 'required|string',
            'father_religion' => 'required|string',
            'mother_religion' => 'required|string',
            'mother_nationality' => 'required|string',
            'father_nationality' => 'required|string',
            'father_occupation' => 'required|string',
            'mother_occupation' => 'required|string',
            'mother_employmentplace' => 'required|string',
            'father_employmentplace' => 'required|string',
            'parent_status' => 'required|string',


            'name' => 'nullable|string',
            'age' => 'nullable|string',
            'educ_attainment' => 'nullable|string',
            'civil_status' => 'nullable|string',
            'workplace' => 'nullable|string',


            'nursery_school' => 'nullable|string',
            'nursery_address' => 'nullable|string',
            'nursery_year' => 'nullable|string',
            'nursery_honors' => 'nullable|string',
            'elem_school' => 'nullable|string',
            'elem_address' => 'nullable|string',
            'elem_year' => 'nullable|string',
            'elem_honors' => 'nullable|string',
            'junior_school' => 'nullable|string',
            'junior_address' => 'nullable|string',
            'junior_year' => 'nullable|string',
            'junior_honors' => 'nullable|string',
            'senior_school' => 'nullable|string',
            'senior_address' => 'nullable|string',
            'senior_year' => 'nullable|string',
            'senior_honors' => 'nullable|string',
            'scholarship' => 'nullable|string',
            'awards' => 'nullable|string',
            'organizations' => 'nullable|string',
            'talents' => 'nullable|array',
            'talents.*' => 'string',
            'athletics' => 'nullable|array',
            'athletics.*' => 'string',
            'pasttime' => 'nullable|array',
            'pasttime.*' => 'string',
            'fav_subject' => 'nullable|array',
            'fav_subject.*' => 'string',
            'personal_traits' => 'nullable|array',
            'personal_traits.*' => 'string',
            'fav_reason' => 'nullable|string',

        ]);

        $personaldata = Personaldata::create([
            'id_number' => $request->input('course'),
            'course' => $request->input('course'),
            'acad_year' => $request->input('acad_year'),
            'lname' => $request->input('lname'),
            'fname' => $request->input('fname'),
            'mname' => $request->input('mname'),
            'nick_name' => $request->input('nick_name'),
            'address' => $request->input('address'),
            'age' => $request->input('age'),
            'status' => $request->input('status'),
            'birthplace' => $request->input('birthplace'),
            'mobile_no' => $request->input('mobile_no'),
            'religion' => $request->input('religion'),
            'citizenship' => $request->input('citizenship'),
            'birthdate' => $request->input('birthdate'),
            'guardian' => $request->input('guardian'),
            'contact_no' => $request->input('contact_no'),
            'guardian_address' => $request->input('guardian_address'),
        ]);

        $familyBackground = FamilyBackground::create([

            'mother_name' => $request->input('mother_name'),
            'father_name' => $request->input('father_name'),
            'mother_age' => $request->input('mother_age'),
            'father_age' => $request->input('father_age'),
            'mother_address' => $request->input('mother_address'),
            'father_address' => $request->input('father_address'),
            'father_religion' => $request->input('father_religion'),
            'mother_religion' => $request->input('mother_religion'),
            'mother_nationality' => $request->input('mother_nationality'),
            'father_nationality' => $request->input('father_nationality'),
            'father_occupation' => $request->input('father_occupation'),
            'mother_occupation' => $request->input('mother_occupation'),
            'mother_employmentplace' => $request->input('mother_employmentplace'),
            'father_employmentplace' => $request->input('father_employmentplace'),
            'parent_status' => $request->input('parent_status'),
        ]);

        $siblings = Siblings::create([
            'name' => $request->input('name'),
            'age' => $request->input('age'),
            'educ_attainment' => $request->input('educ_attainment'),
            'civil_status' => $request->input('civil_status'),
            'workplace' => $request->input('workplace'),
        ]);

        $educationalBackground = EducationalBackground::create([

            'nursery_school' => $request->input('nursery_school'),
            'nursery_address' => $request->input('nursery_address'),
            'nursery_year' => $request->input('nursery_year'),
            'nursery_honors' => $request->input('nursery_honors'),
            'elem_school' => $request->input('elem_school'),
            'elem_address' => $request->input('elem_address'),
            'elem_year' => $request->input('elem_year'),
            'elem_honors' => $request->input('elem_honors'),
            'junior_school' => $request->input('junior_school'),
            'junior_address' => $request->input('junior_address'),
            'junior_year' => $request->input('junior_year'),
            'junior_honors' => $request->input('junior_honors'),
            'senior_school' => $request->input('senior_school'),
            'senior_address' => $request->input('senior_address'),
            'senior_year' => $request->input('senior_year'),
            'senior_honors' => $request->input('senior_honors'),
            'scholarship' => $request->input('scholarship'),
            'awards' => $request->input('awards'),
            'organizations' => $request->input('organizations'),
            'talents' => implode(',', $request->input('talents')),
            'athletics' => implode(',', $request->input('athletics')),
            'pasttime' => implode(',', $request->input('pasttime')),
            'fav_subject' => implode(',', $request->input('fav_subject')),
            'personal_traits' => implode(',', $request->input('personal_traits')),
            'fav_reason' => $request->input('fav_reason'),
        ]);


        $studentInventory = StudentInventory::create([
                'personal_id' => $personaldata->id,
                'fambackground_id' => $familyBackground->id,
                'siblings_id' => $siblings->id,
                'educ_id' => $educationalBackground->id,
        ]);


    } catch (\Exception $e) {
        dd($e->getMessage());
    }
        return redirect('/success')->with('message', 'New inventory Added');
    }

}
