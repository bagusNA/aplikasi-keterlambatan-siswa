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
        Schema::create('picket_schedules', function (Blueprint $table) {
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
            $table->foreignId('picket_session_id');
            $table->foreignId('teacher_id');
            $table->foreignId('school_year_id');
            $table->timestamps();

            $table->foreign('picket_session_id')->references('id')->on('picket_sessions');
            $table->foreign('teacher_id')->references('id')->on('teachers');
            $table->foreign('school_year_id')->references('id')->on('school_years');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('picket_schedules');
    }
};
