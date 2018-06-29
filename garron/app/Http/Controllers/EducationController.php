<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Education;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'school'       => 'required'/*,
            'email'      => 'required|email',
            'nerd_level' => 'required|numeric'*/
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput(Input::except('password'))
                ;
        } else {
            $experience = new Education();
            $user = auth()->user();
            $experience->user_id = $user->id;
            $experience->school       = Input::get('school');
            $experience->degree       = Input::get('degree');
            $experience->field_of_study       = Input::get('field_of_study');
            $experience->grade       = Input::get('grade');
            $experience->activities       = Input::get('activities');
            $experience->from       = Carbon::parse('01-01-'.Input::get('from'));
            $experience->to       = Carbon::parse('01-01-'.Input::get('to'));
            $experience->description       = Input::get('description');

            $experience->save();
            Session::flash('message', 'Successfully created Education!');
            return Redirect::back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
