<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Appointment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CounselingForm;
use App\Models\StudentInventory;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function users(){
        $users = User::all();

        // foreach ($users as $user) {
        //     $user->hasCounseling = CounselingForm::where('fullname', $user->fullname)->exists();
        //     $user->hasStudentInventory = StudentInventory::where('fullname', $user->fullname)->exists();
        //     $user->hasAppointment = Appointment::where('fullname', $user->fullname)->exists();
        //     $user->hasQuestionnaire = Questionnaires::where('fullname', $user->fullname)->exists();
        // }
        return view('admin.pages.users.users', compact('users'));
    }

public function store(Request $request, User $user)
{
    try {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'id_number' => 'required|integer',
            'address' => 'required|string',
            'password' => 'required|string',
            'role' => 'required|string',
        ]);

        $user->name = $validatedData['name'];
        $user->id_number = $validatedData['id_number'];
        $user->address = $validatedData['address'];
        $user->password = $validatedData['password'];
        $user->remember_token = Str::random(10);
        $user->save();

        $user->assignRole($validatedData['role']);

        return redirect()->route('users.store')->with('success', 'user created successfully.');
    } catch (\Exception $e) {
        // Handle exceptions here (e.g., log the error)
        return redirect()->back()->with('error', 'An error occurred while creating the user.');
    }
}


    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.update', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'id_number' => 'required|integer',
            'address' => 'required|string',
            'password' => 'required|string',
            'role' => 'required|string',
        ]);

        $user = User::findOrFail($id);

        $user->name = $validatedData['name'];
        $user->id_number = $validatedData['id_number'];
        $user->address = $validatedData['address'];
        $user->password = $validatedData['password'];
        $user->save();
        $user->syncRoles([$validatedData['role']]);

        return redirect()->route('users.users')->with('success', 'User updated successfully.');
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.users')->with('success', 'User deleted successfully.');
    }
}
