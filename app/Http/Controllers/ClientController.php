<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{

    public function index()
    {
        return view('client.index', ['clients'=>Client::all()]);
    }

    public function create()
    {
        //
    }
    public function edit(int $id)
    {
        return view('client.edit', ['client' => Client::find($id), 'id' => $id]);
    }
    public function edit_res(ClientRequest $req, int $id){
        $client = Client::find($id);
        $client->surname = $req->input('surname');
        $client->firstName = $req->input('firstName');
        $client->patronymic = $req->input('patronymic');
        $client->passport = $req->input('passport');
        $client->birhday = $req->input('birhday');
        $client->address = $req->input('address');
        $client->save();
        return redirect()->action([ClientController::class, 'index'])
            ->with('success', "Был отредактирован клиент ");
    }

    public function update(Request $request, Client $client)
    {
        //
    }

    public function destroy(Client $client)
    {
        //
    }
}
