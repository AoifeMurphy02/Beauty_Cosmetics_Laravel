<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void{Schema::create('appointments', function (Blueprint $table) {
        $table->bigIncrements('appointment_id');
        $table->unsignedBigInteger('staff_id');
        $table->unsignedBigInteger('customer_id');
        $table->unsignedBigInteger('service_id');
        $table->time('time');
        $table->date('date');
        $table->timestamps();
    })
    ;}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
