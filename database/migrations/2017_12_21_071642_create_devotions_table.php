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
            $table->enum('status', ['draft', 'active', 'today'])->default('active'); 
            $table->string('content_url')->nullable();
            $table->string('content_id')->nullable();
            
            $table->string('title');
            $table->string('cover_image')->nullable();
            $table->longText('description', 20000);
            $table->longText('body', 20000);
            $table->longText('confession', 20000);
            $table->longText('prayer', 20000);
            $table->longText('further_reading', 20000);
            $table->longText('bible_verse', 20000);
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
