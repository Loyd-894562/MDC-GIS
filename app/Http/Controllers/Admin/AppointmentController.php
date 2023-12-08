<?php

namespace App\Http\Controllers\Admin;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Mail\AppointmentCreated;
use App\Mail\AppointmentApproved;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AppointmentController extends Controller
{
    public function appointments(){
        $appointments = Appointment::all();
        return view('admin.pages.appointments.appointments', compact('appointments'));
    }
    public function appointmentCalendar(){
        $appointments = Appointment::all();
        return view('admin.pages.appointments.appointment-calendar', compact('appointments'));
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
        Mail::to($appointment->email)->send(new AppointmentCreated($appointment));
        return redirect()->route('appointments.store')->with('success', 'Appointment created successfully.');
    } catch (\Exception $e) {
        // Handle exceptions here (e.g., log the error)
        return redirect()->back()->with('error', 'An error occurred while creating the appointment.');
    }
}


    public function edit($id)
    {
        $appointment = Appointment::findOrFail($id);
        return view('appointments.update', compact('appointment'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|string',
            'date' => 'required|string',
            'time' => 'required|string',
            'reason' => 'required|string',
        ]);

        $appointment = Appointment::findOrFail($id);

        $appointment->fullname = $validatedData['fullname'];
        // $appointment->user_id = Auth::id();
        $appointment->email = $validatedData['email'];
        $appointment->date = $validatedData['date'];
        $appointment->time = $validatedData['time'];
        $appointment->reason = $validatedData['reason'];
        $appointment->save();


        return redirect()->route('appointments.appointments')->with('success', 'Appointment updated successfully.');
    }


    public function destroy($id)
    {
        $appt = Appointment::findOrFail($id);
        $appt->delete();
        return redirect()->route('appointments.appointments')->with('success', 'Task deleted successfully.');
    }

    public function updateStatus(Request $request, $id)
    {

        $appointment = Appointment::findOrFail($id);
        $appointment->status = 1;
        $appointment->save();

        Mail::to($appointment->email)->send(new AppointmentApproved($appointment));
        return redirect()->route('appointments.appointments')->with('success', 'APPOINTMENT APPROVED');
    }


}
