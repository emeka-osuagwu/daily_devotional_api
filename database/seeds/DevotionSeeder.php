<?php

use Illuminate\Database\Seeder;

class DevotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory('App\Models\Devotion', 100)->create();
    }
}
