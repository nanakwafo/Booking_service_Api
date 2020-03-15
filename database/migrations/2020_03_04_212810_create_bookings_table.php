<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up ()
    {
        Schema::create ('bookings', function (Blueprint $table) {
            $table->id ();
            $table->string ('lastname');
            $table->string ('firstname');
            $table->string ('location');
            $table->text ('email');
            $table->text ('tel');
            $table->string ('date');
            $table->time ('time');
            $table->text ('message');
            $table->integer ('service_id');
            $table->timestamps ();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down ()
    {
        Schema::dropIfExists ('bookings');
    }
}
