<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index(){
        return view('application.index', ['applications'=>Application::all()]);
    }

    public function create(){

    }
}
