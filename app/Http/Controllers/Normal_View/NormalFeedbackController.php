<?php

namespace App\Http\Controllers\Normal_View;

use App\Models\User;
use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NormalFeedbackController extends Controller
{
   public function giveFeedback($studentId){
        return view('normal-view.pages.feedback',  compact('studentId'));
    }
    public function index(){
        return view('normal-view.pages.check-feedback');
    }
    public function checkFeedback(Request $request){
        $studentId = $request->input('id_number');
        $studentName = $request->input('name');

        $student = User::where('id_number', $studentId)->where('name', $studentName)->first();

        if ($student) {

            return redirect()->route('normal-view.pages.feedback', ['studentId' => $studentId]);
        } else {

            return back()->with('error', 'Student with ID ' . $studentId . ' not found.');
        }
    }

    public function store(Request $request, Feedback $feedback)
{
    try {
        $validatedData = $request->validate([
            'feedback' => 'required|string|max:255',
        ]);

        $feedback->feedback = $validatedData['feedback'];
        $feedback->save();

        return view('normal-view.pages.confirmation-feedback');
    } catch (\Exception $e) {
        // Handle exceptions here (e.g., log the error)
        return redirect()->back()->with('error', 'An error occurred while creating the feedback.');
    }
}


}
