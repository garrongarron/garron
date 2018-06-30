<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Lang;
use App\Experience;
use App\Education;
use App\UserSkill;
use App\Skill;


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

    public function board(){
        return view('ITResources.board');
    }

    public function update(Request $request){
        $user = auth()->user();
        $user->description = request()->description;
       // $user->phone = request()->phone;
        $user->save();
        return redirect()->back();
    }

    public function saveSkill(Request $request){
        $user = auth()->user();
        $skill = $this->getSkill($request->input('tags'));
        $conditions = ['user_id'=>$user->id, 'skill_id'=>$skill->id];
        $userSkill = UserSkill::where($conditions)->get();
        if($userSkill->isEmpty()){
            $newUserSkill = new UserSkill();   
            $newUserSkill->user_id = $user->id;
            $newUserSkill->skill_id = $skill->id;
            $newUserSkill->save();
        }
        return $skill->name;
    }

    private function getSkill($skillName){
        $slug = str_slug($skillName);
        $skill = Skill::where('slug' ,$slug )->first();
        if(empty($skill)){
            $newSkill = new Skill();
            $newSkill->name = $skillName;
            $newSkill->slug = $slug;
            $newSkill->save();
            return $newSkill;
        }
        return $skill;
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
        $employees = DB::table('users')->where('role', '=', 'employee')->get();
        return view('ITResources.search', [
            'position'=>$this->positions[$position],
            'positions' => $this->positions,
            'employees' => $employees]);
    }

    public function offer($position = 'it-profesional', $slug = null){
        $apply = request()->input('apply');
        $userId = auth()->user()->id;
        $experience = Experience::where('user_id' , $userId)->get();
        $education = Education::where('user_id' , $userId)->get();
        $userSkills = DB::table('skills')
                ->join('user_skill', 'skills.id', '=', 'user_skill.skill_id')
                ->select('skills.*') 
                ->where('user_skill.user_id', '=', $userId)->get();
        $sectoresTmp = DB::table('industry')->select('id', 'description_es')->get();
        $sectores = [];
        $sectores[''] = 'Escoge un sector…';
        foreach($sectoresTmp as $value){
                $sectores[$value->id] = $value->description_es;
        }
        $countryTmp = DB::table('country')->select('code', 'name')->get();
        $country = [];
        foreach($countryTmp as $value){
                $country[$value->code] = $value->name;
        }


        if($slug!==null){
            $user = $employees = DB::table('users')->where('slug', '=', $slug)->get();
            return view('ITResources.offer', [
                'position'=>$this->positions[$position],
                'positions' => $this->positions,
                'edit'=> $apply,
                'user'=> $user[0],
                'experience'=>$experience,
                'education'=>$education,
                'sectores'=>$sectores,
                'country'=>$country,
                'userSkills'=>$userSkills]);
        }

        
        return view('ITResources.offer', [
                'position'=>$this->positions[$position],
                'positions' => $this->positions,
                'edit'=> $apply,
                'user'=> auth()->user(),
                'sectores'=>$sectores,
                'country'=>$country,
                'experience'=>$experience,
                'education'=>$education,
                'userSkills'=>$userSkills]);
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
