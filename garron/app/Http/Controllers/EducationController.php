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
            $education = new Education();
            $user = auth()->user();
            $education->user_id = $user->id;
            $education->school       = Input::get('school');
            $education->degree       = Input::get('degree');
            $education->field_of_study       = Input::get('field_of_study');
            $education->grade       = Input::get('grade');
            $education->activities       = Input::get('activities');
            $education->from       = Carbon::parse('01-01-'.Input::get('from'));
            $education->to       = Carbon::parse('01-01-'.Input::get('to'));
            $education->description       = Input::get('description');

            $education->save();
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
        $education = Education::find($id);
        $education->from = date('Y', strtotime($education->from));
        $education->to = date('Y', strtotime($education->to));
        $ITR = new ITResources();
        $sectores = $ITR->getIndustry();
        $country = $ITR->getCountry();
        return view('ITResources.widget.educationForm', [
            'education' => $education,
            'toUpdate' => '-update']);
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
        // validate
        // read more on validation at http://laravel.com/docs/validation
        /*$rules = array(
            'name'       => 'required',
            'email'      => 'required|email',
            'nerd_level' => 'required|numeric'
        );
        $validator = Validator::make(Input::all(), $rules);*/

        // process the login
        // if ($validator->fails()) {
        //     return Redirect::to('nerds/' . $id . '/edit')
        //         ->withErrors($validator)
        //         ->withInput(Input::except('password'));
        // } else {
            // store
            $education = Education::find($id);
            $education->school = Input::get('school');
            $education->degree = Input::get('degree');
            $education->field_of_study = Input::get('field_of_study');
            $education->grade = Input::get('grade');
            $education->activities = Input::get('activities');
            $education->from = Carbon::parse('01-01-'.Input::get('from'));
            $education->to = Carbon::parse('01-01-'.Input::get('to'));
            $education->description = Input::get('description');
            $education->save();
            // redirect
            Session::flash('message', 'Successfully updated education!');
            return redirect()->back();
        // }
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
