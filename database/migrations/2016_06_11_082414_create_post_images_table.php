<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_images', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('post_image_id');
            $table->integer('post_id')->unsigned()->nullable();
            $table->string('img_path');
            $table->timestamps();
        });

        Schema::table('post_images', function($table) {
            $table->foreign('post_id')->references('id')->on('posts');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('post_images');
    }
}
