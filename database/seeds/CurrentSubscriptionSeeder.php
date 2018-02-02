<?php

use Illuminate\Database\Seeder;

class CurrentSubscriptionSeeder extends Seeder
{
    /**s
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory('App\Models\ActiveSubscription', 1)->create();
    }
}
