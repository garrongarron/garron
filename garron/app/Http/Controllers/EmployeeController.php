<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function landing(){
    	return view('Professional.home');
    }

    public function apply(Request $request){
    	DB::table('application')->insert([
    		'position_id'=>$request->positionid,
    		'user_id'=>auth()->user()->id,
    	]);
        session()->flash('message', 'Successfully created Application!');
        return redirect()->back();
    }
}
