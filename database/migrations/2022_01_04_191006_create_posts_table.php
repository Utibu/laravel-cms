<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id('id');
            $table->bigInteger('site_id')->unsigned();
            $table->string('slug', 255);
            $table->string('title', 255);
            $table->longText('description');
            $table->string('status', 20);
            $table->bigInteger('author_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('site_id')
            ->references('id')
            ->on('sites')
            ->onDelete('cascade');
            $table->foreign('author_id')
              ->references('id')
              ->on('users')
              ->nullOnDelete();
            $table->unique(['site_id', 'slug'], 'site_id_slug');
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
