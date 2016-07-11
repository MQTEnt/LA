<?php

use Illuminate\Database\Seeder;
class studentsTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
	        [
	        	'name' => str_random(10),
	        	'email' => str_random(10),
	        	'phone' => '0123456789',
	        	'birth_year' => 1995,
	        	'created_at' => new DateTime()
	        ],
	        [
	        	'name' => str_random(10),
	        	'email' => str_random(10),
	        	'phone' => '0123456787',
	        	'birth_year' => 1995,
	        	'created_at' => new DateTime()
	        ],
	        [
	        	'name' => str_random(10),
	        	'email' => str_random(10),
	        	'phone' => '0123456786',
	        	'birth_year' => 1995,
	        	'created_at' => new DateTime()
	        ]
        ]);
    }
}
