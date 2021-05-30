<?php


namespace App\Http\Controllers;


use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function create(Request $request)
    {
        $validated = $request->validate([
            'fio' => 'required',
            'age' => 'required|integer',
            'passport_number' => 'required|size:10',
            'contact_data' => 'required',
            'token' => 'required'
        ]);
        if (!UserController::hasAccess($validated['token'])) {
            return ['error' => 'у вас нет доступа'];
        }
        unset($validated['token']);

        $client = Client::query()->create($validated);

        return ['id' => $client->id];
    }

    public function getClients(Request $request)
    {
        $validated= $request->validate([
            'token'=>'required'
        ]);
        if (!UserController::hasAccess($validated['token'])) {
            return ['error' => 'у вас нет доступа'];
        }
        unset($validated['token']);
        return Client::all();
    }
}
