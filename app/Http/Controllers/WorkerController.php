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
            ->with('success', "был удален работник");
    }
    // увольнение работника
    public function delete(int $id){
        Worker::destroy($id);
        return redirect()->action([WorkerController::class, 'index'])
            ->with('success', "Был уволен работник");
    }

    public function create()
    {
        //
    }



}
