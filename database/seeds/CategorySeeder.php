<?php

use Illuminate\Database\Seeder;

use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$create = [
    		'title' => 'Faith'
    	];

    	Category::create($create);

    	$create = [
    		'title' => 'Courage'
    	];

    	Category::create($create);
    	
    	$create = [
    		'title' => 'Worship'
    	];

    	Category::create($create);
    	
    	$create = [
    		'title' => 'Prayer'
    	];

    	Category::create($create);
    	
    	$create = [
    		'title' => 'Salvation'
    	];

    	Category::create($create);

    	$create = [
    		'title' => 'Love'
    	];

    	Category::create($create);

    	$create = [
    		'title' => 'Wisdom'
    	];

    	Category::create($create);

    	$create = [
    		'title' => 'Thanksgiving'
    	];

    	Category::create($create);

    	$create = [
    		'title' => 'Joy'
    	];

    	Category::create($create);
    }
}
