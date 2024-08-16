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
            $table->string('title',200);
            $table->text('body');
            $table->text('summary')->nullable(); # if no summary we will use body
            $table->string('slug',200)->unique();
            $table->string('image',255)->nullable(); # not recommended - all posts should have an image as per design
            $table->string('video',255)->nullable(); # store video name in db
            $table->string('video_sub',255)->nullable(); # store video subtitle name in db
            $table->integer('category_id')->unsigned();
            $table->integer('user_id')->unsigned(); # user id from user table (author of post)
            $table->boolean('sticky');
            $table->boolean('featured');
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
        Schema::dropIfExists('posts');
    }
}
