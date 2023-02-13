<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParkRequest;
use App\Models\Modelcar;
use App\Models\Park;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ParkController extends Controller
{
    public function index()
    {
        return view('park.index', ['parks' => Park::all()]);
    }
    // добавление детали
    public function create()
    {
        return view('park.create');
    }
    public function create_res(ParkRequest $req){
        $temp = DB::table('parks')->where('modelcar_id', $req->input('model'))
            ->where('title', $req->input('title'))
            ->where('price', $req->input('price'))
            ->where('defect_id', $req->input('defect'))->value('id');

        if ($temp == null) {
            $park = new Park();
            $park->modelcar_id = $req->input('model');
            $park->title = $req->input('title');
            $park->price = $req->input('price');
            $park->defect_id = $req->input('defect');
            $park->save();
            $file = $req->file('photo');
            if ($file != null){
                $id = Park::all()->last()->id;
                $file->storePubliclyAs('public/images/park',$id.'.jpg');
            }
            return redirect()->action([ParkController::class, 'index'])
                ->with('success', "Была добавлена запчасть");
        }
        else{
            return redirect()->action([ParkController::class, 'index'])
                ->with('success', "такая деталь уже есть");
        }
    }
    // редактирование детали
    public function edit(int $id)
    {
        $park = Park::all()->find($id);
        return view('park.edit', ['park' => $park, 'id' => $id]);
    }

    public function edit_res(ParkRequest $req, int $id){
        $park = Park::all()->find($id);
        $park->title = $req->input('title');
        $park->price = $req->input('price');
        $park->save();
        $file = $req->file('photo');
        $file?->storePubliclyAs('public/images/park', $id.'.jpg');
        return redirect()->action([ParkController::class, 'index'])
            ->with('success', "Была изменена деталь");

    }

}
