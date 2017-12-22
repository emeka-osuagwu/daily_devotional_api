<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devotions', function (Blueprint $table) {
            $table->increments('id');

            $table->enum('type', ['audio', 'video', 'text'])->default('text'); 
            $table->string('content_url')->nullable();
            $table->string('content_id')->nullable();
            
            $table->string('title')->unique();
            $table->string('cover_image')->nullable();
            $table->string('description', 500);
            $table->string('body', 2000);
            $table->string('confession', 500);
            $table->string('prayer', 500);
            $table->string('further_reading', 500);
            $table->string('bible_verse', 500);
            $table->integer('category_id');

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
        Schema::dropIfExists('devotions');
    }
}
