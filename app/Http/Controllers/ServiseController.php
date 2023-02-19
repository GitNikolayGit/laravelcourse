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
        $service->price = $req->input('price');
        $service->defect_id = $req->input('defect');
        $service->save();
        return back()->with('success', 'была добавлена услуга');
    }

    public function edit(int $id){
        $service = Service::find($id);
        return view('service.edit', ['service'=>$service, 'id'=>$id]);
    }

    public function edit_res(Request $req, int $id)
    {
        //'title',
        //        'time',
        //        'price',
        //        'defect_id'
        $service = Service::find($id);
        $service->title = $req->input('title');
        $service->time = $req->input('time');
        $service->price = $req->input('price');
        $service->defect_id = $req->input('defect');
        $service->save();
        return redirect()->action([ServiseController::class, 'index'])
            ->with('success', "Была изменена услуга");
    }

    public function sort(Request $req)
    {
        return view('service.index', ['services' => Service::all()
            ->where('defect_id', $req->input('defect'))]);
    }
}
