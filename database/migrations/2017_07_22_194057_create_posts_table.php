<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
			$table->string('title');
			$table->date('ddate')->nullable();
			$table->string('time')->nullable();
			$table->string('avatar')->nullable();
			$table->string('venue')->nullable();
            $table->string('color')->nullable();
			$table->text('body');
			$table->unsignedInteger('category_id');
			
				
            $table->timestamps();
			$table->softDeletes();
			
			$table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
