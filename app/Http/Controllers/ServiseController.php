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

    public function create(Request $req)
    {
        $service = new Service();
        $service->title = $req->input('title');
        $service->time = $req->input('time');
        $service->price = $req->input('defect');
        $service->defect_id = $req->input('defect');
        $service->save();
        return back()->with('success', 'была добавлена деталь');
    }

    public function sort(Request $req)
    {
        ;
        return view('service.index', ['services' => Service::all()
            ->where('defect_id', $req->input('defect'))]);
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
