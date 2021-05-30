<?php


namespace App\Http\Controllers;


use App\Models\Policy;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PolicyController
{
    public function createPolicy(Request $request)
    {
        $validated = $request->validate([
            'series' => 'required',
            'number' => 'required',
            'valid_to' => 'required',
            'date_registration' => 'required',
            'client_id' => 'required',
            'policy_type_id' => 'required',
            'token'=>'required'
        ]);
        if (!UserController::hasAccess($validated['token'])) {
            return ['error' => 'у вас нет доступа'];
        }

        $validated['valid_to']=Carbon::parse($validated['valid_to']);
        $validated['date_registration']=Carbon::parse($validated['date_registration']);

        unset($validated['token']);
        $policy=Policy::query()->create($validated);

        return $policy;
    }
    public function getPolicies(Request $request){
        $validated=$request->validate([
           'token'=>'required'
        ]);

        if (!UserController::hasAccess($validated['token'])) {
            return ['error' => 'у вас нет доступа'];
        }
        unset($validated['token']);

        return Policy::all();
    }
}
