<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationRequest;
use App\Models\Application;
use App\Models\Car;
use App\Models\Client;
use App\Models\Repair;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ApplicationController extends Controller
{
    public function index(){
        //return view('application.index', ['applications'=>Repair::all()->groupBy('application_id') ]);
        return view('application.index', ['applications'=>Repair::all()->groupBy('application_id')]);
    }

    public function create(){
        return view('application.create');
    }

    public function create_res(ApplicationRequest $req){

        // клиент
        $temp = DB::table('clients')->where('passport', $req->input('passport'))->value('id');
        if ($temp == null) {
            $client = new Client();
            $client->surname = $req->input('surname');
            $client->firstName = $req->input('firstName');
            $client->patronymic = $req->input('patronymic');
            $client->passport = $req->input('passport');
            $client->birhday = $req->input('birhday');
            $client->address = $req->input('address');
            $client->save();
            $file = $req->file('photo-client');
            if ($file != null){
                $id = DB::table('clients')->where('passport', $req->input('passport'))->value('id');
                $file->storePubliclyAs('public/images/person', $id.'.jpg');
            }
            //else {
           //     $file->storePubliclyAs('public/images/person','noo.jpg');
           // }
        }
        // машина
        $car = new Car();
        $car->surname = $req->input('surname-owner');
        $car->firstName = $req->input('firstName-owner');
        $car->patronymic = $req->input('patronymic-owner');
        $car->date = $req->input('date');
        $car->num = $req->input('num');
        $car->modelcar_id = $req->input('model');
        $car->color_id = $req->input('color');
        $car->defect_id = $req->input('defect');
        $car->save();
        $appl = new Application();
        $appl->car_id = Car::all()->last()->id;
        $appl->client_id = DB::table('clients')
            ->where('passport', $req->input('passport'))->value('id');;
        $appl->date_start = now('Europe/Moscow');
        $appl->save();
        return redirect()->action([RepairController::class, 'create']);
       // return redirect()->action([ApplicationController::class, 'index'])
       //     ->with('success', "Была добавлена заявка");
    }
    // выбрать все заявки
    public function select_all(){
        return view('application.index', ['applications' => Repair::withTrashed()->get()->groupBy('application_id')]);
    }
}
