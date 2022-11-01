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
        Schema::create('picket_sessions', function (Blueprint $table) {
            $table->id();
            $table->enum('day', [
                'Mon',
                'Tue',
                'Wed',
                'Thu',
                'Fri',
                'Sat',
                'Sun'
            ]);
            $table->time('time_start');
            $table->time('time_end');
            $table->timestamps();

            // Might use these for it needs to be archived per school year
            // $table->foreignId('school_year_id');
            // $table->foreign('school_year_id')->references('id')->on('school_years');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('picket_sessions');
    }
};
