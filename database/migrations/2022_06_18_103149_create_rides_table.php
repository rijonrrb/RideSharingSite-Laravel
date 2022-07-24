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
        Schema::create('rides', function (Blueprint $table) {
            $table->id();
            $table->string('customerName');
            $table->unsignedBigInteger('customerId');
            $table->string('customerPhone');
            $table->string('pickupPoint');
            $table->string('destination');
            $table->Integer('length');
            $table->Integer('cost');
            $table->unsignedBigInteger('riderId')->nullable();
            $table->string('riderName')->nullable();
            $table->string('riderPhone')->nullable();
            $table->string('customerStatus');
            $table->string('riderStatus')->nullable();

            $table->foreign('customerId')->references('id')->on('customers');
            $table->foreign('riderId')->references('id')->on('riders');
             $table->string('rideRequestTime');
             $table->string('riderApprovalTime')->nullable();
             $table->string('riderStartingTie')->nullable();
             $table->string('reachedTime')->nullable();
             $table->string('cancelTime')->nullable();
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rides');
    }
};
