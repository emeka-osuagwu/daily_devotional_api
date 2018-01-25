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
            'role' => 'admin',
    		'admin_level' => 1,
    		'password' => bcrypt('password'),
    	];

    	App\Models\User::create($create);
    }
}
