<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Position;
use App\Mail\ApplyToPosition;

class EmployeeController extends Controller
{
    public function landing(){
    	return view('Professional.home');
    }

    public function apply(Request $request){
        $user = auth()->user();

        $this->saveApplication($user->id, $request->positionid);

        session()->flash('message', 'Successfully created Application!');

        //Email Sending
        $this->sendMailConfirmation($user, $request->positionid);
        
        //redirect
        return redirect()->back();
    }

    public function saveApplication($userId, $positionId){
        DB::table('application')->insert([
            'position_id'=>$positionId,
            'user_id'=>$userId,
        ]);   
    }

    public function sendMailConfirmation($user, $positionId){
        $position = Position::find($positionId);
        Mail::to($user->email,$user->name)
            ->send(new ApplyToPosition($user, $position));
    }
}
