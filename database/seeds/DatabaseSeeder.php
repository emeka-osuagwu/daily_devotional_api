<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        // $this->call(CategorySeeder::class);
        // $this->call(DevotionSeeder::class);
        // $this->call(AdminUserSeeder::class);
        $this->call(SubscriptionSeeder::class);
        // $this->call(CurrentSubscriptionSeeder::class);
    }
}
