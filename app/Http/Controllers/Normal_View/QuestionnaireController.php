<?php

namespace App\Http\Controllers\Normal_View;

use App\Models\User;
use App\Models\Formcode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionnaireController extends Controller
{
    public function fillQuestionnaire($studentId){
        return view('normal-view.pages.questionnaire',  compact('studentId'));
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


            if ($formName === 'Readmission Form') {

                return view('normal-view.pages.questionnaire', ['studentId' => $studentId]);
                // return redirect()->route('normal-view.pages.questionnaire', ['studentId' => $studentId]);
            } else {

                return view('normal_view', ['studentId' => $studentId]);
            }
        } else {
            return back()->with('error', 'Student with ID ' . $studentId . ' not found.');
        }
    }


}
