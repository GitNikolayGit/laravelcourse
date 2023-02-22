<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Car;
use App\Models\Client;
use App\Models\Defect;
use App\Models\Modelcar;
use App\Models\Profession;
use App\Models\Repair;
use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{
    public function index(){
        return view('statistic.index', ['info' => []]);
    }
    // 1. Фамилия, имя, отчество и адрес владельца автомобиля с данным номером государственной
    public function query(Request $req){
        $num = $req->input('num');
        $repair = Repair::all() ;
        $info = [];
        $info['запрос'] = 'Фамилия, имя, отчество и адрес владельца автомобиля с данным номером';
        foreach ($repair as $item) {
            if ($item->application->car_id == $num){
                $info['Фамилия'] = $item->application->client->surname;
                $info['Имя'] = $item->application->client->firstName;
                $info['Отчество'] = $item->application->client->patronymic;
                $info['Адрес'] = $item->application->client->address;
                return view('statistic.index', ['info' => $info]);
            }
        }
        return view('statistic.index', ['info' => $info]);
    }
    // 2.	Марка и год выпуска автомобиля данного владельца
    public function query2(Request $req){
        $client = $req->input('client');
        $repair = Repair::all() ;
        $info = [];
        $info['запрос'] = 'Марка и год выпуска автомобиля данного владельца';
        foreach ($repair as $item) {
            if ($item->application->client_id == $client){
                $info['Клиент'] = $item->application->client->surname.' '.$item->application->client->firstName.' '.$item->application->client->patronymic;
                $info['Марка'] = $item->application->car->modelcar->brand->title;
                $info['Модель'] = $item->application->car->modelcar->title;
                $info['Год выпуска'] = $item->application->car->date;
                return view('statistic.index', ['info' => $info]);
            }
        }
        return view('statistic.index', ['info' => $info]);
    }
    // 3.	Перечень устраненных неисправностей в автомобиле данного владельца
    public function query3(Request $req){
        $client = $req->input('client');
        $repair = Repair::all() ;
        $info = [];
        $info['запрос'] = 'Перечень устраненных неисправностей в автомобиле данного владельца';
        $i = 0;
        foreach ($repair as $item) {
            if ($item->application->client_id == $client){
                $info['Неиcправность'.++$i] = $item->service->title;
            }
        }
        return view('statistic.index', ['info' => $info]);
    }
    // 4.	Фамилия, имя, отчество работника станции, устранявшего данную
    // неисправность в автомобиле данного клиента, и время ее устранения
    public function query4(Request $req){
        $client = $req->input('client');
        $repair = Repair::all() ;
        $info = [];
        $i = 0;
        $info['запрос'] = 'Фамилия, имя, отчество работника станции, устранявшего данную неисправность в автомобиле данного клиента, и время ее устранения';
        foreach ($repair as $item){
            if ($item->application->client_id == $client){
                $i2 = ++$i;
                $info['работник'.$i2] = $item->worker->surname.' '.$item->worker->firstName.' '.$item->worker->patronymic;
                $info['услуга'.$i2] = $item->service->title;
                $info['время'.$i2] = $item->service->time;
            }
        }
        return view('statistic.index', ['info' => $info]);
    }
    // 5.	Фамилия, имя, отчество клиентов, сдавших в ремонт автомобили с указанным типом неисправности
    public function query5(Request $req){
        $defect = $req->input('defect');
        $repair = Repair::all() ;
        $info = [];
        $i = 0;
        $info['запрос'] = 'Фамилия, имя, отчество клиентов, сдавших в ремонт автомобили с указанным типом неисправности';

        foreach ($repair as $item){
            if ($item->application->car->defect_id == $defect){
                $i2 = ++$i;
                $info['клиент'.$i2] = $item->application->client->surname.' '.$item->application->client->firstName.' '.$item->application->client->patronymic;
            }
        }
        return view('statistic.index', ['info' => $info]);
    }
    // 6.	Самая распространенная неисправность в автомобилях указанной марки
    public function query6(Request $req){
        $cars = Car::all();
        $info = [];
        $temp = [];
        $info['запрос'] = 'Самая распространенная неисправность в автомобилях указанной марки';
        foreach (Defect::all() as $defect) {
            $temp[$defect->title] = 0;
            foreach ($cars as $car) {
                if ($car->modelcar->brand_id == $req->input('brand')) {
                    if ($car->defect_id == $defect->id) {
                        $temp[$defect->title] += 1;
                    }
                }
            }
        }
        $info['неисправность'] = array_search(max($temp), $temp);
        return view('statistic.index', ['info' => $info]);
    }
    // 7.	Количество рабочих каждой специальности на станции
    public function query7(){
        $info = [];
        $info['запрос'] = 'Количество рабочих каждой специальности на станции';
        foreach (Profession::all() as $prof){
            $info[$prof->title] = 0;
            foreach (Worker::all() as $worker){
                if ($prof->id == $worker->profession_id){
                    $info[$prof->title] += 1;
                }
            }
        }
        return view('statistic.index', ['info' => $info]);
    }
}
