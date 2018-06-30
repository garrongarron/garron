<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CountryTableSeeder::class);
        $this->call(IndustryTableSeeder::class);
        $faker = Faker::create();
        DB::table('users')->insert([
            'name' => 'Fede',
            'email' => 'fede@email.com',
            'role' => CreateUsersTable::$roles[0],
            'description' => $faker->realText(),
            'password' => bcrypt('123456'),
            'slug' => str_slug('Fede'),
        ]);
        
        foreach (range(1,2) as $index) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'role' => CreateUsersTable::$roles[1],
                'description' => $faker->realText(),
                'password' => bcrypt('secret'),
                'slug' => str_slug($faker->name),
            ]);
        }
        
        /*foreach (range(1,5) as $index) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'role' => CreateUsersTable::$roles[2],
                'description' => $faker->realText(),
                'password' => bcrypt('secret'),
                'slug' => str_slug($faker->name),
            ]);
        }*/
        


       
    }
}
