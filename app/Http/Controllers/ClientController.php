<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

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

    public function update(Request $request, Client $client)
    {
        //
    }

    public function destroy(Client $client)
    {
        //
    }
}
