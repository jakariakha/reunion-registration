<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('father_name', 255);
            $table->string('mother_name', 255);
            $table->text('address');
            $table->text('current_job');
            $table->string('mobile_number', 11)->unique();
            $table->string('t_shirt_size');
            $table->string('ssc_result_status');
            $table->string('ssc_batch')->nullable();
            $table->string('study_status_check')->nullable();
            $table->string('study_year_count')->nullable();
            $table->string('which_class')->nullable();
            $table->string('participation_type');
            $table->string('take_come_children')->nullable();
            $table->string('child_age_less_five')->nullable();
            $table->string('child_age_more_five')->nullable();
            $table->string('total_participant');
            $table->string('total_amount');
            $table->string('payment_status');
            $table->string('registrant_ID')->unique();
            $table->string('password');
            $table->string('registrant')->nullable();
            $table->string('registrant_name')->nullable();
            $table->string('registrant_mobile_number')->nullable();
            $table->string('t_shirt_given')->nullable();
            $table->string('food_given')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
