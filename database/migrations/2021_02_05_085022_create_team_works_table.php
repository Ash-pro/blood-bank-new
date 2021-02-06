<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_works', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('Phone');
            $table->string('image');
            $table->string('address');
            $table->string('facebook_link');
            $table->string('twitter_link');
            $table->string('instagram_link');

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
        Schema::dropIfExists('team_works');
    }
}
