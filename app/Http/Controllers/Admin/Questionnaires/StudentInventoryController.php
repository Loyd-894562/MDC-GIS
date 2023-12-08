<?php

namespace App\Http\Controllers\Admin\Questionnaires;

use App\Models\Siblings;
use PDF;
use App\Models\Personaldata;
use Illuminate\Http\Request;
use App\Models\FamilyBackground;
use App\Models\StudentInventory;
use App\Http\Controllers\Controller;
use App\Models\EducationalBackground;

class StudentInventoryController extends Controller
{
    public function inventory(Request $request)
{
    $count = StudentInventory::count();

    $query = StudentInventory::with('personaldata')->orderBy('id', 'asc');

    if ($request->has('search')) {
        $searchTerm = $request->input('search');
        $query->whereHas('personaldata', function ($query) use ($searchTerm) {
            $query->where('fname', 'like', '%' . $searchTerm . '%')
                  ->orWhere('lname', 'like', '%' . $searchTerm . '%')
                  ->orWhere('id_number', 'like', '%' . $searchTerm . '%');
        });
    }

    $inventory = $query->paginate(10);

    return view('admin.pages.questionnaires.inventory.inventory', compact('inventory', 'count'));
}


    public function inventoryCreate()
    {
        return view('admin.pages.questionnaires.inventory.inventory-create');
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
        return redirect('/admin/inventory')->with('message', 'New inventory Added');
    }

    public function inventoryEdit($id)
    {
        $inventory = StudentInventory::findOrFail($id);
        return view('admin.pages.questionnaires.inventory.inventory-update', compact('inventory'));
    }

    public function inventoryUpdate(Request $request, $id)
    {
        try {
            $request->validate([
                // ... validation rules for the fields you want to update
            ]);

            $inventory = StudentInventory::find($id);

            // Update Personaldata
            $inventory->personaldata->update([
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

            // Update FamilyBackground
            $inventory->familyBackground->update([
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

            // Update Siblings
            $inventory->siblings->update([
                'name' => $request->input('name'),
                'age' => $request->input('age'),
                'educ_attainment' => $request->input('educ_attainment'),
                'civil_status' => $request->input('civil_status'),
                'workplace' => $request->input('workplace'),
            ]);

            // Update EducationalBackground
            $inventory->educationalBackground->update([
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

            // Update the main StudentInventory
            $inventory->update($request->all());

            return redirect('/admin/inventory')->with('message', 'Inventory Form Updated!');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }



public function destroy($id)
{
    $inventory = StudentInventory::findOrFail($id);
    $inventory->delete();
    return redirect('/admin/inventory')->with('message', 'inventory deleted successfully.');
}


public function downloadPDF($id) {
    $inventory = StudentInventory::findOrFail($id);


    $pdf = PDF::loadView('admin.pages.questionnaires.inventory.inventory-pdf', compact('inventory'));
    $pdf->setPaper('Folio', 'portrait');
    return $pdf->download('inventory_form.pdf');
}

// public function printinventory($id) {
//     $inventory = StudentInventory::findOrFail($id);
//     return view('admin.pages.questionnaires.inventory.inventory-pdf', compact('inventory'));
// }
}
