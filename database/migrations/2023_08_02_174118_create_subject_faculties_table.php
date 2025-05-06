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
        Schema::create('subject_faculties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subject_id')->references('id')->on('subjects');
            $table->foreignId('faculty_id')->references('id')->on('faculties');
            $table->foreignId('year_id')->nullable()->references('id')->on('years');
            $table->foreignId('semester_id')->nullable()->references('id')->on('semesters');
            $table->foreignId('organization_id')->references('id')->on('organizations');
            $table->timestamps();
        });
    }

    /*
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subject_faculties');
    }
};
