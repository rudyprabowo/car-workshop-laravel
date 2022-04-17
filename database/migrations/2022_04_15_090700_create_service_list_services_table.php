<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceListServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_list_services', function (Blueprint $table) {
            $table->id();
            $table->string('service_status')->default('unassigned');
            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            // $table->unsignedBigInteger('list_service_id')->nullable();
            $table->unsignedBigInteger('list_service_id');
            // $table->foreign('id', 'list_service_id')->references('id')->on('list_services')->onDelete('cascade');
            $table->foreign('list_service_id')->references('id')->on('list_services')->onDelete('cascade');
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
        Schema::dropIfExists('service_list_services');
    }
}
