<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Lang;


class HomeController extends Controller
{
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

    public function chooser(){
    	session(['locale' =>Input::get('locale')]);
    	Lang::setLocale(Input::get('locale'));

    	//dd(Lang::locale());
    	return back();
    }

    static public function getSlider(){
    	return DB::table('v_slider')->where('lang',session('locale'))->get();
    }
	
	static public function getService(){
		return DB::table('v_service')->where('lang',session('locale'))->get();
	}
	
	static public function getTeam(){
		return DB::table('v_team')->where('lang',session('locale'))->get();
	}

	static public function getProject(){
		return DB::table('v_project')->where('lang',session('locale'))->get();
	}

	static public function getTestimonial(){
		return DB::table('v_testimonial')->where('lang',session('locale'))->get();
	}


}
