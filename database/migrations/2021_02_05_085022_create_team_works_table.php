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
            $table->string('email');
            $table->string('image')->nullable();
            $table->string('Phone')->nullable();
            $table->string('address')->nullable();
            $table->string('name_contact_1')->nullable();
            $table->string('link_contact_1')->nullable();
            $table->string('name_contact_2')->nullable();
            $table->string('link_contact_2')->nullable();
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
