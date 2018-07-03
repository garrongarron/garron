<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Auth;
use App\Experience;
use App\Education;
use App\UserSkill;
use App\Position;
use App\Skill;
use App\User;


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
        $user->name = request()->name;
        //$user->description = request()->description;
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

    public function jobs($position =null, Request $request){
        if($position==null){
            $position = request()->input('s');
            if(empty($position)){
                $position = session('itSearch');
            } else {
                session(['itSearch' =>$position]);
            }
            $jobs = Position::where('title_slug','LIKE','%'.str_slug($position).'%')->paginate(4);
        } else {
            $title = $position;
            $jobs = Position::where('title_slug', $title)->paginate(4);
            $position = $this->positions[$position];
        }
        $paginatorLink = $jobs->links();


        $last = Position::limit(5)->get();

        return view('ITResources.jobs',[
            'position'=>$position,
            'positions' => $jobs,
            'last' => $last,
            'paginatorLink'=>$paginatorLink]);
    }

    public function position($position){
        $positionId = explode('-', $position);
        $positionId = $positionId[count($positionId)-1];
        $position = Position::find($positionId);
        if(Auth::guest()){
            $applied = false;
        } else {
            $user = auth()->user();
            $applied = DB::table('application')
                    ->where('user_id',$user->id)
                    ->where('position_id',$positionId)->exists();
        }

        return view('ITResources.position',[
            'position' => $position,
            'positionId' => $positionId,
            'applied' => $applied,
            'industry' => $this->getIndustry()]);
    }



    public function searchProfesional(){
        $position = request()->input('s');
        if(empty($position)){
            $position = session('itSearch');
        } else {
            session(['itSearch' =>$position]);
        }

        $users = DB::table('users as U')
            ->join('user_skill as US', 'US.user_id', '=', 'U.id')
            ->join('skills as S', 'S.id', '=', 'US.skill_id')
            ->select('U.*','S.name as skill')
            ->where('S.name', 'LIKE', '%'.$position.'%')->get();
            //dd($users);
        $skill = DB::table('skills')->get();

        return view('ITResources.search', [
            'position'=>$position,
            'skills' => $skill,
            'employees' => $users
        ]);
    }

    public function search($position){
        $skill = DB::table('skills')->get();
        $employees = DB::table('users')->where('role', '=', 'employee')->get();
        return view('ITResources.search', [
            'position'=>$this->positions[$position],
            'positions' => $this->positions,
            'skills' => $skill,
            'employees' => $employees]);
    }

    private function getIndustry(){
        $sectoresTmp = DB::table('industry')->select('id', 'description_es')->get();
        $sectores = [];
        $sectores[''] = 'Escoge un sector…';
        foreach($sectoresTmp as $value){
                $sectores[$value->id] = $value->description_es;
        }
        return $sectores;
    }

    private function getCountry(){
        $countryTmp = DB::table('country')->select('code', 'name')->get();
        $country = [];
        foreach($countryTmp as $value){
                $country[$value->code] = $value->name;
        }
        return $country;
    }
    public function offer2($position = 'it-profesional', $slug = null){

    }

    public function profile($slug){
        $profile = User::where('slug', $slug)->first();
        $userId = $profile->id;
        $experience = Experience::where('user_id' , $userId)->get();
        $education = Education::where('user_id' , $userId)->get();
        $userSkills = DB::table('skills')
                ->join('user_skill', 'skills.id', '=', 'user_skill.skill_id')
                ->select('skills.*') 
                ->where('user_skill.user_id', '=', $userId)->get();
        return view('ITResources.offer',
            [
                'user' => $profile,
                'position' => 'adasdasd',
                'experience'=>$experience,
                'education'=>$education,
                'userSkills'=>$userSkills,
            ]);
    }


    public function offer($position = 'it-profesional', $slug = null){
        $apply = request()->input('apply');
        $userId = auth()->user()->id;
        if($slug!==null){
            $employee = DB::table('users')->where('slug', '=', $slug)->first();
            $userId = $employee->id;
        }
        $experience = Experience::where('user_id' , $userId)->get();
        $education = Education::where('user_id' , $userId)->get();
        $userSkills = DB::table('skills')
                ->join('user_skill', 'skills.id', '=', 'user_skill.skill_id')
                ->select('skills.*') 
                ->where('user_skill.user_id', '=', $userId)->get();
        $sectores = $this->getIndustry();
        $country = $this->getCountry();

        $applications = DB::table('position')
            ->select('position.*')
            ->join('application', 'position.id', '=','application.position_id' )
            ->where('application.user_id', $userId)->get();

        return view('ITResources.profile', [
                'position'=>$this->positions[$position],
                'positions' => $applications,
                'edit'=> $apply,
                'user'=> auth()->user(),
                'sectores'=>$sectores,
                'country'=>$country,
                'experience'=>$experience,
                'education'=>$education,
                'userSkills'=>$userSkills,
                'industry' => $this->getIndustry(),]);
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
