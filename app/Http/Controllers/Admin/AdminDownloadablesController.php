<?php

namespace App\Http\Controllers\Admin;

use App\Models\Downloadable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminDownloadablesController extends Controller
{
    public function index()
    {
        $files = Downloadable::all();
        return view('admin.pages.downloadables', compact('files'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);

        $file = $request->file('file');
        $name = time() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('uploads', $name);

        Downloadable::create([
            'name' => $name,
            'path' => $path,
        ]);

        return redirect()->route('files.index')->with('success', 'File uploaded successfully.');
    }

    public function download($id)
    {
        $file = Downloadable::findOrFail($id);
        return response()->download(storage_path('app/' . $file->path));
    }

    public function destroy($id)
    {
        $file = Downloadable::findOrFail($id);
        $file->delete();

        return redirect()->route('files.index')->with('success', 'File deleted successfully.');
    }
}
