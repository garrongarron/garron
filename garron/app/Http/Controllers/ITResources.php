<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Lang;


class ITResources extends Controller
{
    private $positions = [
            'Full Stack Developer'
            ,'Team Leader'
            ,'System Administrator'
            ,'DBA'
            ,'IT Profesional'];

    public function __construct(){
        $var = [];
        foreach ($this->positions as $key => $value) {
            $var[str_slug($value)] = $value;
        }
        $this->positions = $var;
    }
    public function home(){
        Lang::setLocale(session('locale')); 
        view()->composer('main.slider', function($view){
            $view->with('sliders', HomeController::getSlider());
        });
        view()->composer('main.service', function($view){
            $view->with('services', HomeController::getService());
        });
        view()->composer('main.team', function($view){
            $view->with('team', HomeController::getTeam());
        });
        view()->composer('main.project', function($view){
            $view->with('projects', HomeController::getProject());
        });
        view()->composer('main.testimonial', function($view){
            $view->with('testimonials', HomeController::getTestimonial());
        });
    	return view('main.body');
    }


    public function jobs($position){
        return view('ITResources.jobs',[
            'position'=>$this->positions[$position],
            'positions' => $this->positions]);
    }

     public function position($position){
        return view('ITResources.position',[
            'position'=>$this->positions[$position],
            'positions' => $this->positions]);
    }

    public function search($position){
        return view('ITResources.search', [
            'position'=>$this->positions[$position],
            'positions' => $this->positions]);
    }

    public function offer($position){

        $apply = request()->input('apply');
        
        return view('ITResources.offer', [
            'position'=>$this->positions[$position],
            'positions' => $this->positions,
            'edit'=> $apply]);
    }
    
    public function salary($position){
        return view('ITResources.salary', [
            'position'=>$this->positions[$position],
            'positions' => $this->positions]);
    }

    public function init(){
       // return 'jaja';
        //return str_slug('Federico zacayan');
        return view('ITResources.landing', [
            'positions' => $this->positions]);
    }



}
