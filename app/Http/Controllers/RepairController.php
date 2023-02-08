<?php

namespace App\Http\Controllers;

use App\Models\Repair;
use Illuminate\Http\Request;

class RepairController extends Controller
{

    public function index()
    {
        return view('repair.index', ['repairs'=>Repair::with(['service', 'car', 'client', 'park'])->get()]);
    }
    // оформление заявки
    public function create()
    {
        return view('repair.create');
    }

    public function edit(Repair $repair)
    {
        //
    }

    public function destroy(Repair $repair)
    {
        //
    }
}
