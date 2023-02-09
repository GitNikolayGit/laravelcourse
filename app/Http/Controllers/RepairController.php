<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationRequest;
use App\Models\Car;
use App\Models\Client;
use App\Models\Repair;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function create_res(ApplicationRequest $req){
        //dd($req->input('service'));


        $temp = DB::table('clients')->where('passport', $req->input('passport'))->value('id');
        //dd($temp);
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
                //$id = Client::all()->last()->id;
                $id = DB::table('clients')->where('passport', $req->input('passport'))->value('id');
                $file->storePubliclyAs('public/images/person', $id.'.jpg');
            }
        }

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

        $repair = new Repair();
        $repair->service_id = $req->input('service');

        $repair->car_id = DB::table('cars')->where('num', $req->input('num'))->value('id');



        $repair->worker_id = $req->input('worker');
        $repair->client_id = DB::table('clients')->where('passport', $req->input('passport'))->value('id');

        $repair->park_id = $req->input('park');
        //$repair->defect_id = $req->input('defect');
        $repair->save();

        return redirect()->action([RepairController::class, 'index'])
            ->with('success', "Была добавлена заявка");
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
