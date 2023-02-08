<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Color;
use App\Models\Defect;
use Illuminate\Http\Request;
use App\Http\Requests\CarRequest;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    // машины в ремонте
    public function index($id = null){

        $car = new Car();

        return view('car.index', ['cars'=>Car::with(['modelcar', 'color', 'defect'])->get(), 'car'=>$car]);
    }
    // окно редактирования машины
    public function edit(int $id){
        $cars = Car::with(['modelcar', 'color', 'defect'])->get();
        $car = $cars->find($id);
        return view('car.edit', ['car'=>$car, 'cars'=>$cars]);
    }
    // редактирование машины
    public function edit_res(CarRequest $req, int $id){
        $car = Car::all()->find($id);
        $car->num = $req->input('num');
        $car->surname = $req->input('surname');
        $car->firstName = $req->input('firstName');
        $car->patronymic = $req->input('patronymic');
        $car->color_id = $req->input('color');
        $car->defect_id = $req->input('defect');
        $car->save();
        return redirect()->action([CarController::class, 'index'])
            ->with('success', "Была отредактирована машина, с номером ".$car->num);
    }
    // добавление цвета
    public function add_color(Request $req){
        $temp = DB::table('colors')->where('title', $req->input('color'));
        if ($temp == null) {
            $color = new Color();
            $color->title = $req->input('color');
            $color->save();
            return back()->with('success', 'Был добавлен цвет ' . $color->title);
        }
        else{
            return back()->with('success', 'Такой цвет уже есть');
        }

    }

    public function sort_brand(){
        return view('car.index');
    }
}
