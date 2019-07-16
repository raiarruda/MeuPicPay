<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MoneyValidationForm;
use App\Models\Balance;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Route;

class BalanceController extends Controller
{

    public function  index(){
    	//user logado
	    $balance = auth()->user()->balance;
    	$amount = $balance? $balance->amount : 0;
    	return view('admin.balance.index', compact('amount'));
    }

    public function deposit(){

	    return view('admin.balance.deposit');
    }
    public function withdraw(){

	    return view('admin.balance.withdraw');
    }
    public function transferTo(){

	    return view('admin.balance.transfer-to');
    }
    public function transfer(Request $request, User $user){
	    $sendTo = $user->getSender($request->sendTo);
    	return view ('admin.balance.transfer', compact('sendTo'));

    }
    public function transferConfirm(Request $request){


	    //parte 2 ->  sacar na conta origem

	    $balanceOrigem = auth()->user()->balance;
	    // $responseOrigem = $balanceOrigem->withdraw($request->valor);

	    //parte 1 -> depositar na conta destino
		$userDestino =User::find($request->sendTo);

	    $balanceDestino = $userDestino->balance;
	    $responseDestino = $balanceDestino->deposit($request->valor);

	    dd($responseDestino);
    }




    public function depositStore(MoneyValidationForm $request){
	    $balance = auth()->user()->balance()->firstOrCreate([]);
		$response = $balance->deposit($request->valor);
		if($response['success']) {
			echo "oi";

			return redirect()
				->route('admin.balance')
				->with('success', $response['message']);
			}

		return redirect()
				->back()
				->with('error', $response['message']);

    }

    public function transferStore(MoneyValidationForm $request, User $user){
    	$user = $user->find($request->sendTo);
	    $balance = $user->balance()->firstOrCreate([]);

	    $response = $balance->transfer($request->valor, $user);



		if($response['success']) {
			return redirect()
				->route('admin.balance')
				->with('success', $response['message']);
			}

		return redirect()
				->back()
				->with('error', $response['message']);

    }

    public function withdrawStore(MoneyValidationForm $request){

	    $balance = auth()->user()->balance()->firstOrCreate([]);
		$response = $balance->withdraw($request->valor);


		if($response['success']) {

			return redirect()
				->route('admin.balance')
				->with('success', $response['message']);
			}

		return redirect()
				->back()
				->with('error', $response['message']);

    }


}
