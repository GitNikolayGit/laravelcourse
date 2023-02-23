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
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Service;

class StatisticController extends Controller
{
    public function index(){
        return view('statistic.index', ['info' => []]);
    }
    // 1. Фамилия, имя, отчество и адрес владельца автомобиля с данным номером государственной
    public function query(Request $req){
        $num = $req->input('num');
        $repair = Repair::all() ;
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
        $repair = Repair::all();
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
        $repair = Repair::all();
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
    // справки о количестве автомобилей в ремонте на текущий момент
    public function query_count_car(){
        $info['запрос'] = 'количество автомобилей в ремонте на текущий момент';
        $info['количество'] = Repair::all()->unique('application_id')->count();
        return view('statistic.certificate_count_car', ['info' => $info]);
    }
    // количество незанятых рабочих на текущий момент
    public function query9(){
        $worker_in_work = Repair::select('worker_id')->get()->groupBy('worker_id')->count();
        $all_worker = Worker::all()->count();
        $info['запрос'] = 'количество незанятых рабочих на текущий момент';
        $info['количество'] = $all_worker - $worker_in_work;
        return view('statistic.certificate_count_car', ['info' => $info]);
    }
    // выдача месячного отчета
    // 1 количестве устраненных неисправностей каждого вида
    // 2 доходе, полученном станцией
    // 3 перечень отремонтированных за прошедший месяц автомобилей
    // 4 перечень находящихся в ремонте автомобилей
    // время ремонта каждого автомобиля,
    // список его неисправностей,
    // сведения о работниках, осуществлявших ремонт
    public function query10(){
        $date = Carbon::now()->setTimezone('Europe/Moscow')->subMonth();
        $info[''] = 'Месячный отчет';
        $report = Repair::onlyTrashed()->where('created_at', '>', $date)->get();
        // 1 количество устраненных неисправностей каждого вида
        $info['отчет 1'] = 'количество устраненных неисправностей каждого вида';
        // доход
        $income = 0;

        foreach (Service::all() as $service) {
            $temp = Repair::onlyTrashed()->where('service_id', $service->id)->first();
            if ($temp != null) {
                $info[$service->title] = 0;
                foreach ($report as $rep) {
                    if ($rep->service_id == $service->id) {
                        $info[$service->title] += 1;
                        $income += $service->price;
                    }
                }
            }
        }
        // 2 доходе, полученном станцией
        $info['отчет 2'] = 'доход полученный станцией';
        $info['Сумма'] = $income;
        // 3 перечень отремонтированных за прошедший месяц автомобилей
        $info['отчет 3'] = 'перечень отремонтированных за прошедший месяц автомобилей';
        foreach ($report as $rep){
            $info[$rep->application->car->modelcar->brand->title.' '.$rep->application->car->modelcar->title]
                = 'номер '.$rep->application->car->num;
        }
        // 4 перечень находящихся в ремонте автомобилей
        $cars = Repair::all()->groupBy('application_id');
        $info['отчет 4'] = 'перечень находящихся в ремонте автомобилей';
        foreach ($cars as $car){
            $info[$car[0]->application->car->modelcar->brand->title.' '.$rep->application->car->modelcar->title]
                = 'номер '.$car[0]->application->car->num;
        }



        return view('statistic.certificate_count_car', ['info' => $info]);
    }
}
