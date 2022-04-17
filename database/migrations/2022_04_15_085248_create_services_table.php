<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('car_name');
            $table->string('car_plate_number');
            $table->timestamp('car_in_workshop');
            $table->string('service_status')->default('unassigned');
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade'); //Untuk delete data service jika data user terhapus
            $table->unsignedBigInteger('mechanic_id')->nullable();
            $table->foreign('mechanic_id')->references('id')->on('users')->onDelete('cascade'); //Untuk delete data service jika data user terhapus
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
        Schema::dropIfExists('services');
    }
}
