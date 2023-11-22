<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Activitylog\Models\Activity;

class LogsController extends Controller
{
    public function index(){
        $logs = Activity::get();
        return view('admin.pages.logs', compact('logs'));
    }
}
