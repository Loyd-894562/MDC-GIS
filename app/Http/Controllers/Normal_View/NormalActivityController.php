<?php

namespace App\Http\Controllers\Normal_View;

use App\Models\Adminactivity;
use App\Http\Controllers\Controller;

class NormalActivityController extends Controller
{
    public function activities()
    {
        $activities = Adminactivity::orderBy('id', 'desc')->paginate(5);

        return view('normal-view.pages.activity', compact('activities'));
    }
}
