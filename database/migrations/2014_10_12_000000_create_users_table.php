<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('image')->nullable();
            $table->jsonb('location')->nullable();
            
            $table->enum('role', ['admin', 'user'])->default('user');    
            $table->enum('admin_level', [0, 1])->default(0);    
            $table->enum('profile_status', ['active', 'pending'])->default('pending');    
            $table->enum('account_type', ['regular', 'social_auth'])->default('social_auth');    
            $table->string('platform_name')->nullable();    
            
            $table->string('email')->unique();
            $table->longText('password', 20000);
            
            $table->longText('oauth', 20000)->nullable();
            $table->string('push_token')->nullable();    

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
