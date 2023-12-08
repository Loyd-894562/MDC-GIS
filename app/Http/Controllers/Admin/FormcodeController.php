<?php

namespace App\Http\Controllers\Admin;

use App\Models\Formcode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FormcodeController extends Controller
{
    public function indexCode(){
        $generated = Formcode::get();
        return view('admin.pages.generate-code', compact('generated'));
    }
    public function generateCode(Request $request)
    {
        $request->validate([
            'form_name' => 'required',
        ]);

        $formName = $request->input('form_name');
        $randomCode = strtoupper(bin2hex(random_bytes(4))); // Generate a random 8-character hex code

        // Save the generated code to the database
        $formcode = Formcode::create([
            'form_name' => $formName,
            'form_code' => $randomCode,
        ]);

        return redirect()->back()->with([
            'success' => 'Code generated and saved successfully.',
            'generated_code' => $formcode->code,
        ]);
    }
}
