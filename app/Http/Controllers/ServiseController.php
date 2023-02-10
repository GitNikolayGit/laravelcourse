<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiseController extends Controller
{
    public function index()
    {
        return view('service.index', ['services' => Service::with('defect')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $servise
     * @return \Illuminate\Http\Response
     */
    public function show(Service $servise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $servise
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $servise)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $servise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $servise)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $servise
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $servise)
    {
        //
    }
}
