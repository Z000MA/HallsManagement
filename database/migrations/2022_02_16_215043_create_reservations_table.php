<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->integer('hall_id');
            $table->integer('customer_id');
            $table->integer('period_id');
            $table->date('date');
            $table->decimal('sub_total', 9, 2)->default(0);
            $table->decimal('discount', 9, 2)->default(0);
            $table->decimal('total', 9, 2)->default(0);
            $table->integer('user_id');
            $table->integer('state_id')->default(1);
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
        Schema::dropIfExists('reservations');
    }
}
