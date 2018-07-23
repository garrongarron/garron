<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Experience;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $experience = new Experience();
        $user = auth()->user();
        
        $experience->user_id = $user->id;
        $experience->save();
        dd(Experience::all());
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
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'title'       => 'required'/*,
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
            $experience = new Experience();
            $user = auth()->user();
            $experience->user_id = $user->id;
            $experience->title       = Input::get('title');
            $experience->company       = Input::get('company');
            $experience->location       = Input::get('location');
            $experience->from       = Carbon::parse(Input::get('from'));
            $experience->to       = Carbon::parse(Input::get('to'));
            $experience->industry       = Input::get('industry');
            $experience->headline       = Input::get('headline');
            $experience->description       = Input::get('description');

            $experience->save();
            Session::flash('message', 'Successfully created Experience!');
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
        $experience = Experience::find($id);
        $ITR = new ITResources();
        $sectores = $ITR->getIndustry();
        $country = $ITR->getCountry();
        return view('ITResources.widget.experienceForm', [
            'sectores'=>$sectores,
            'country'=>$country,
            'experience' => $experience,
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
            $experience = Experience::find($id);
            $experience->title = Input::get('title');
            $experience->company = Input::get('company');
            $experience->location = Input::get('location');
            $experience->from = Input::get('from');
            $experience->to = Input::get('to');
            $experience->industry = Input::get('industry');
            $experience->headline = Input::get('headline');
            $experience->description = Input::get('description');
            $experience->save();

            // redirect
            Session::flash('message', 'Successfully updated experience!');
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
