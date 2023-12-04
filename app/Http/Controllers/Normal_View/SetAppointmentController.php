<?php

namespace App\Http\Controllers\Normal_View;

use App\Models\User;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SetAppointmentController extends Controller
{
    public function setAppointment($studentId){
        return view('normal-view.pages.appointment',  compact('studentId'));
    }
    public function index(){
        return view('normal-view.pages.check-appointment');
    }
    public function checkAppointment(Request $request){
        $studentId = $request->input('id_number');
        $studentName = $request->input('name');

        $student = User::where('id_number', $studentId)->where('name', $studentName)->first();

        if ($student) {

            return redirect()->route('normal-view.pages.appointment', ['studentId' => $studentId]);
        } else {

            return back()->with('error', 'Student with ID ' . $studentId . ' not found.');
        }
    }

    public function store(Request $request, Appointment $appointment)
{
    try {
        $validatedData = $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|string',
            'date' => 'required|string',
            'time' => 'required|string',
            'reason' => 'required|string',
        ]);

        $appointment->fullname = $validatedData['fullname'];
        // $appointment->user_id = Auth::id();
        $appointment->email = $validatedData['email'];
        $appointment->date = $validatedData['date'];
        $appointment->time = $validatedData['time'];
        $appointment->reason = $validatedData['reason'];
        $appointment->save();

        return view('normal-view.pages.confirmation');
    } catch (\Exception $e) {
        // Handle exceptions here (e.g., log the error)
        return redirect()->back()->with('error', 'An error occurred while creating the appointment.');
    }
}
}
