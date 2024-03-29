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
        Schema::create('questionnaire_interviews', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('program');
            $table->string('id_number');
            $table->string('academic_year');
            $table->string('feeling');
            $table->longText('plans');
            $table->longText('difficulties');
            $table->longText('assisted');
            $table->longText('skills');
            $table->longText('comments');
            $table->longText('acad_exp');
            $table->longText('suggestion');
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questionnaire_interviews');
    }
};
