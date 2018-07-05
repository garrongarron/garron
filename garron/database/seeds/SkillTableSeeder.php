<?php

use Illuminate\Database\Seeder;

class SkillTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	
        $skills = [
        	'Full Stack Developer'
            ,'Team Leader'
            ,'System Administrator'
            ,'DBA'
            ,'Analista Funcional'
            ,'IT Profesional',
            ///////////////////////////////////////
			'HTML',
			'PHP',
			'Composer',
			'ORM',
			'PHP Developer',
			'PHP Back-End',
			'PHP Front-End',
			'Responsive Design',
			'Patterns design',
			'MVC',
			'Jquery',
			'Ajax',
			'Socket.IO',
			'Node',
			'Node.Js',
			'React',
			'Synfony',
			'Laravel',
			'Mysql',
			'SQL',
			'PL-SQL',
			'T-SQL',
			'Stored Procedure',
			'Views SQL',
			'Javascript',
			'Soap',
			'Api Rest',
			'Web Services',
			'UML',
			'TDD',
			'OOP',
			'CSS',
			'Sass',
			'Less',
			'UX',
			'Bootstrap',
			'Fundation',
			'ES6',
			'Angular',
			'Type Script',
			'Full Stack',
			'Git',
			'Gitlab',
			'Github',
			'Tortoise',
			'Linux',
			'XAMP',
			'WAMP',
			'Docker',
			'VirtualBox',
			'MongoDB',
			'Postgres',
			'Ionic',
			'Scrum',
			'Trello',
			'Jira',
			'Photoshop',
			'Firewoks',
			'Require.js',
			'ASP.NET',
			'Visual Studio',
			'Eclipse',
			'Sublime',
			'PHPStorm',
			'XAML',
			'XPath',
			'XQuery',
			'DevOps',
			'Kubernetes',
			'Test Cases Design',
			'User Cases Design',
			'Memcached',
			'Redis',
			'ELK',
			'Elastic Search',
			'Logstach',
			'Kibana',
		];
        foreach($skills as $skill){
        	DB::table('skills')->insert([
		        'name' => $skill,
		        'slug' => str_slug($skill)
		    ]);
        }
        $usersQuentity = DB::table('users')->select('id')->where('role', 'employee')->get()->toArray();
        //dd($usersQuentity);

        for ($i=1; $i < count($skills); $i++) { 
        
        	shuffle($usersQuentity);
        	$n = 0;
        	foreach ($usersQuentity as $value) {
		        DB::table('user_skill')->insert([
		            'user_id' => $value->id,
		            'skill_id' => $i
		        ]);
		        if($n++ > 2){
		        	break;
		        }
		    }
		    if($i > 3){
		    	break;
		    }
        }
    }
}
