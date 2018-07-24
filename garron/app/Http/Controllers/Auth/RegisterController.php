<?php

namespace App\Http\Controllers\Auth;


use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\Wellcome;
use App\Cvfile;

use App\Http\Controllers\EmployeeController;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->redirectTo = url()->previous();
        $this->redirectTo = route('ITResources.professional.home');
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(Request $request)
    {
        $path  = null;
        if($request->hasFile('file')){
            $validation = $request->validate([
                'file' => 'file|max:4096'
            ]);
            $file      = $validation['file']; // get the validated file
            $extension = $file->getClientOriginalExtension();
            $filename  = 'file-' . time() . '.' . $extension;
            $path      = $file->storeAs('cvs', $filename);
        }


        $data = $request->all();
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'slug' => str_slug($data['name']),
            'description' => '',
            'role' => $data['role']
        ]);

        if($path != null){
            $cvfile = new Cvfile();
            $cvfile->user_id = $user->id;
            $cvfile->file = $path;
            $cvfile->save();
        }

        Mail::to($data['email'],$data['name'])
            ->send(new Wellcome($data));
        
        if(isset($data['positionId'])){
            $positionId = $data['positionId'];
            $EmployeeController = new EmployeeController();
            $EmployeeController->saveApplication($user->id, $positionId);
            $EmployeeController->sendMailConfirmation($user, $positionId);
            session()->flash('message', 'Successfully created Application!');
        }

        return $user;
    }
}
