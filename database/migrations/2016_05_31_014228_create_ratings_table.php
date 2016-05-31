<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('rating_id');
            $table->integer('post_id')->unsigned()->nullable();
            $table->longText('contents');
            $table->string('rater_email');
            $table->integer('rating');
            $table->timestamps();
        });

        Schema::table('ratings', function($table) {
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
        Schema::drop('ratings');
    }
}
