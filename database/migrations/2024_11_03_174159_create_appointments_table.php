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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->unsignedBigInteger('animal_type_id')->nullable(false);

            $table->string('animal_name');
            $table->integer('animal_age')->nullable();
            $table->text('symptoms');
            $table->date('appointment_date');
            $table->enum('appointment_period', ['morning', 'afternoon']);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('animal_type_id')->references('id')->on('animal_types');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
