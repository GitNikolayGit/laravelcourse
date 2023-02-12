<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Repair;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

//'application_id',    // номер заявки
//    'service_id',        // оказанная услуга
//    'worker_id',         // работник
//    'park_id',           // запчасть
//    'price',
//    'time_work',
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
            else {
                $file->storePubliclyAs('public/images/person','noo.jpg');
            }
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
}
