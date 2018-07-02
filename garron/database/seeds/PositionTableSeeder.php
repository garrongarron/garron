<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PositionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $positions = [
            'Full Stack Developer'
            ,'Team Leader'
            ,'System Administrator'
            ,'DBA'
            ,'IT Profesional'];
        $faker = Faker::create();

        foreach (range(1,15) as $index) {
            $position = $positions[random_int( 0,count($positions)-1)];
            DB::table('position')->insert([
                'title' => $position,
                'title_slug' => str_slug($position),
                'description' => $faker->realText(),
                'type' => 'Full-Time',
                'salary' => '40000',
                'mandatory_requirements' => $faker->realText(180),
                'desiderable_requirements' => $faker->realText(100),
                'industry' => 'Tecnologia de la Información',
                'location' => 'Buenos Aires',
            ]);
        }
    }
}
