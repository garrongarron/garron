<?php

namespace App\Http\Controllers;

use App\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;



class PositionController extends Controller
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
            'title'       => 'required',
            'description'       => 'required',
            'type'       => 'required',
            'industry'       => 'required',
            'location'       => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput(Input::except('password'))
                ;
        } else {
            //dd($request->description);
            $position = new Position();
            $position->user_id = auth()->user()->id;
            $position->title = $request->title;
            $position->title_slug = str_slug($request->title);
            $position->description = str_replace("\n", '<br>', $request->description);
            $position->type = $request->type;
            $position->salary = $request->salary;
            $position->mandatory_requirements = str_replace("\n", '<br>', $request->mandatory_requirements);
            $position->desiderable_requirements = str_replace("\n", '<br>', $request->desiderable_requirements);
            $position->industry = $request->industry;
            $position->location = $request->location;
            $position->save();

            //dd(Position::all());
            Session::flash('message', 'Successfully created Position!');
            return Redirect::back();
        }
            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $position = Position::find($id);
        
        $ITR = new ITResources();
        $sectores = $ITR->getIndustry();
        $country = $ITR->getCountry();
        return view('ITResources.widget.positionForm', [
            'position' => $position,
            'industry' => $sectores,
            'toUpdate' => '-update']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function edit(Position $position)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function update($id)
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
            $position = Position::find($id);
            $position->title = Input::get('title');
            $position->description = Input::get('description');
            $position->type = Input::get('type');
            $position->salary = Input::get('salary');
            $position->mandatory_requirements = Input::get('mandatory_requirements');
            $position->desiderable_requirements = Input::get('desiderable_requirements');
            $position->industry = Input::get('industry');
            $position->location = Input::get('location');
            $position->save();

            // redirect
            Session::flash('message', 'Successfully updated position!');
            return redirect()->back();
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function destroy(Position $position)
    {
        //
    }
}
