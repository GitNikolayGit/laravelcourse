<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandRequest;
use App\Http\Requests\ColorRequest;
use App\Http\Requests\ModelRequest;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Color;
use App\Models\Defect;
use App\Models\Modelcar;
use Illuminate\Http\Request;
use App\Http\Requests\CarRequest;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    // машины в ремонте
    public function index(){
        return view('car.index', ['cars'=>Car::with(['modelcar', 'color', 'defect'])->get()]);
    }
    // окно редактирования машины
    public function edit(int $id){
        $cars = Car::with(['modelcar', 'color', 'defect'])->get();
        $car = $cars->find($id);
        return view('car.edit', ['car'=>$car, 'id'=>$id]);
    }
    // редактирование машины
    public function edit_res(CarRequest $req, int $id){
        $car = Car::find($id);
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
    public function add_color(ColorRequest $req){
        $temp = DB::table('colors')->where('title', $req->input('color'))->value('id');
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
    // добавление бренда
    public function add_brand(BrandRequest $req){
        $temp = DB::table('brands')->where('title', $req->input('brand'))->value('id');
        if ($temp == null) {
            $brand = new Brand();
            $brand->title = $req->input('brand');
            $brand->save();
            return back()->with('success', 'Был добавлена марка автомобиля');
        }
        else{
            return back()->with('success', 'Такая марка авто уже есть');
        }
    }
    // добавление модели
    public function add_model(ModelRequest $req){
        $temp = DB::table('modelcars')
            ->where('title', $req->input('model') && 'brane_id', $req->input('brand'))
            ->value('id');
        if ($temp == null) {
            $model = new Modelcar();
            $model->brand_id = $req->input('brand');
            $model->title = $req->input('model');
            $model->save();
            return back()->with('success', 'Была добавлена модель');
        }
        else{
            return back()->with('success', 'Такая модель уже есть');
        }
    }

    // выборка по модели
    public function sort_model(Request $req){
        return view('car.index', ['cars' => Car::all()
            ->where('modelcar_id', $req->input('model'))]);

    }
}
