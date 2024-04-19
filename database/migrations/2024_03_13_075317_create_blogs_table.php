<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->tinyInteger('home_page_status');
            $table->tinyInteger('header_sec');
            $table->text('name');
            $table->text('eng_name');
            $table->text('link')->nullable();
            $table->text('keyword')->nullable();
            $table->text('sort_description')->nullable();
            $table->string('image_ids')->nullable();
            $table->string('thumb_images')->nullable();
            $table->string('categories_ids')->nullable();
            $table->string('state_ids')->nullable();
            $table->string('district_ids')->nullable();
            $table->longText('description')->nullable();
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
        Schema::dropIfExists('blogs');
    }
};
