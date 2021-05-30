<?php


namespace App\Http\Controllers;


use App\Models\Contract;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    public function createContract(Request $request){
        $validated=$request->validate([
            'date_registration'=>'required',
            'sum'=>'required',
            'policy_id'=>'required',
            'token'=>'required'
        ]);
        if (!UserController::hasAccess($validated['token'])) {
            return ['error' => 'у вас нет доступа'];
        }
        unset($validated['token']);

        $validated['date_registration']=Carbon::parse($validated['date_registration']); //парсим прилетевшую дату

        Contract::query()->create($validated);

        return ['success'=>true];
    }
    public function getContracts(Request $request){
        $validated= $request->validate([
            'token'=>'required'
        ]);
        return Contract::query()->with(['policy','policy.policy_type','policy.client'])->get(); //выводим договоры вместе со связанными полисами и клиентами
    }
}
