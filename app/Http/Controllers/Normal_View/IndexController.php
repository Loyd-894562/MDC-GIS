<?php

namespace App\Http\Controllers\Normal_View;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // if (auth()->check()) {
        //     view('normal-view.pages.home');
        // }
        // return view('normal-view.pages.home');


        return view('normal-view.pages.home');
    }
    public function dashboardNormal()
    {
        return view('normal-view.pages.dashboard');
    }
    public function about()
    {
        return view('normal-view.pages.about');
    }
    public function services()
    {
        return view('normal-view.pages.services');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
