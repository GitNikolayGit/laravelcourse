<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationRequest;
use App\Models\Application;
use App\Models\Car;
use App\Models\Client;
use App\Models\Repair;
use App\Models\Service;
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
        return redirect()->back() ;


        //return redirect()->action([RepairController::class, 'index'])
        //    ->with('success', "Была добавлена заявка");
    }
}
