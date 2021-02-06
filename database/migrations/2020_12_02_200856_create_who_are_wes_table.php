<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWhoAreWesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('who_are_wes', function (Blueprint $table) {
            $table->id();
            $table->text('general_description')->nullable();
            $table->text('team_description')->nullable();
            $table->string('youtube_link')->nullable();
            $table->string('photo1')->nullable();
            $table->string('photo2')->nullable();
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
        Schema::dropIfExists('who_are_wes');
    }
}
