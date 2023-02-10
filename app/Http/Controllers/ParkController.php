<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParkRequest;
use App\Models\Park;
use Illuminate\Http\Request;

class ParkController extends Controller
{
    public function index()
    {
        return view('park.index', ['parks' => Park::all()]);
    }

    public function create()
    {
        //
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
