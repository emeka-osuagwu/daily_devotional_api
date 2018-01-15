<?php

use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$create = [
    		'first_name' => 'Admin',
    		'last_name' => 'Admin',
    		'email' => 'admin@gmail.com',
    		'password' => bcrypt('password'),
    	];

    	App\Models\User::create($create);
    }
}
