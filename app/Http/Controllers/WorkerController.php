<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkerRequest;
use App\Models\Profession;
use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function index()
    {
        return view('worker.index', ['workers'=> Worker::with('profession')->get()]);
    }
    // редактирование работника
    public function edit(int $id){
        return view('worker.edit', ['worker' => Worker::find($id), 'id' => $id]);
    }
    public function edit_res(WorkerRequest $req, int $id){
        $worker = Worker::find($id);
        $worker->surname = $req->input('surname');
        $worker->firstName = $req->input('firstName');
        $worker->patronymic = $req->input('patronymic');
        $worker->category = $req->input('category');
        $worker->experience = $req->input('experience');
        $worker->profession_id = Profession::all()->where('title', $req->input('profession'))->value('id');
        $worker->save();
        return redirect()->action([WorkerController::class, 'index'])
            ->with('success', "были изменены данны");
    }
    // увольнение работника
    public function delete(int $id){
        Worker::destroy($id);
        return redirect()->action([WorkerController::class, 'index'])
            ->with('success', "Был уволен работник");
    }
    // добавление работника
    public function create()
    {
        return view('worker.create');
    }
    public function create_res(WorkerRequest $req){
        $worker = new Worker();
        $worker->surname = $req->input('surname');
        $worker->firstName = $req->input('firstName');
        $worker->patronymic = $req->input('patronymic');
        $worker->category = $req->input('category');
        $worker->experience = $req->input('experience');
        $worker->profession_id = $req->input('profession');
        $worker->save();

        $file = $req->file('photo');
        if ($file != null){
            $id = Worker::all()->last()->id;
            $file->storePubliclyAs('public/images/worker', $id.'.jpg');
        }
        return redirect()->action([WorkerController::class, 'index'])
            ->with('success', "Был добавлен сотрудник");
    }



}
