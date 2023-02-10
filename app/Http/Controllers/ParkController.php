<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParkRequest;
use App\Models\Park;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $temp = DB::table('parks')->where('title', $req->input('title'
            && 'price', $req->input('price')))->value('id');
        if ($temp == null) {
            $park = new Park();
            $park->title = $req->input('title');
            $park->price = $req->input('price');
            $park->save();
            $file = $req->file('photo');
            if ($file != null){
                $id = Park::all()->last()->id;
                $file->storePubliclyAs('public/images/park', $id.'.jpg');
            }
            return redirect()->action([ParkController::class, 'index'])
                ->with('success', "Была добавлена запчасть");
        }
        else{
            return redirect()->action([ParkController::class, 'index'])
                ->with('success', "такая деталь уже есть");
        }
    }

    public function delete(Request $request)
    {
        //
    }

    public function edit(int $id)
    {
        //
    }

    public function edit_res(ParkRequest $req){

    }

}
