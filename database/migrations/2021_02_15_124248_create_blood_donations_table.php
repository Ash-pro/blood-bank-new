<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloodDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blood_donations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('full_name',100);
            $table->integer('national_id')->unique();
            $table->string('birthday_date');
            // فصيلة الدم
            $table->unsignedBigInteger('blood_type');
            $table->string('last_donation_date');
            // اسم المحافظة
            $table->string('province_name');
            // اسم المنطقة
            $table->string('region_name');
            $table->string('phone_number');
            // عدد الوحدات المراد التبرع بها
            $table->integer('unit_number');
            $table->string('donation_form')->nullable();
            $table->boolean('active')->default(0);
            $table->text('messages')->nullable();
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('blood_type')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blood_donations');
    }
}
