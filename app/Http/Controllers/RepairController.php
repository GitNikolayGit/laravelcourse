<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationRequest;
use App\Models\Application;
use App\Models\Car;
use App\Models\Client;
use App\Models\Repair;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
        return view('repair.index', ['repairs'=>Repair::all()]);
    }
    // оформление заявки
    public function create(int $id)
    {
        return view('repair.create', ['applications' => Application::find($id)]);
    }
    public function create_res(Request $req, int $id ){
        $repair = new Repair();
        $repair->application_id = $id;
        $repair->service_id = $req->input('service');
        $repair->worker_id = $req->input('worker');
        $repair->park_id = $req->input('park');
        $repair->save();
        return redirect()->back();
    }
    // выборка по номеру машины
    public function select_num(Request $req){
        $repairs = Repair::where('application_id', $req->input('appl'))->get();
        return view('repair.index', ['repairs' =>  $repairs]);
    }

    // справка о приеме
    public function reception(int $id){
        $repairs = Repair::where('application_id', $id)->get();
        $time = new Carbon($repairs->first()->application->created_at);
        foreach ($repairs as $rep){
            $str = explode(':', $rep->service->time);
            $time->addHours((int)$str[0]);
            $time->addMinutes((int)$str[1]);
        }
        return view('repair.reception', ['repairs' => $repairs, 'time' => $time]);
    }
    // справка о выдачи
    public function reception_return(int $id){
        $repairs = Repair::where('application_id', $id)->get();
        $service = [];
        $service_price = 0;
        $park = [];
        $price_park = 0;
        $price = 0;
        foreach ($repairs as $rep) {
            $service[$rep->service->title ] = ['время'=>$rep->service->time, 'цена'=>$rep->service->price];// = $rep->service->title;
            $service_price += $rep->service->price;
            $park[$rep->park->title] = $rep->park->price;
            $price += $rep->service->price + $rep->park->price;
        }
        return view('repair.reception_return',
            ['repairs'=>$repairs, 'service'=>$service, 'park'=>$park, 'price'=>$price]);
    }
}
