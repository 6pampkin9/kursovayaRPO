<?php


namespace App\Http\Controllers;


use App\Models\PolicyType;
use Illuminate\Http\Request;

class PolicyTypeController extends Controller
{
    public function createPolicyType(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'token' => 'required',
        ]);
        if (!UserController::hasAccess($validated['token'])) {
            return ['error' => 'у вас нет доступа'];
        }
        unset($validated['token']);

        PolicyType::query()->create($validated); // создаем тип полиса с введенными данными
        return ['success'=> true];
    }

    public function getPolicyTypes(Request $request)
    {
        return PolicyType::all();
    }
}
