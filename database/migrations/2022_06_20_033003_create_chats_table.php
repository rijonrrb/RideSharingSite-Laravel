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
        Schema::create('chats', function (Blueprint $table) {
            $table->id();
            $table->string('customerId')->nullable();
            $table->string('riderId')->nullable();
            $table->string('cmessage')->nullable();
            $table->string('rmessage')->nullable();
            $table->string('time')->nullable();
            //$table->timestamps();

          //  $table->foreign('customerId')->references('id')->on('customers');
            //$table->foreign('riderId')->references('id')->on('riders');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chats');
    }
};
