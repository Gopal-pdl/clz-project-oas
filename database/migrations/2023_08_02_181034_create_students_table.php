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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('rand_id');
            $table->foreignId('fiscal_year_id')->references('id')->on('fiscal_years');
            $table->foreignId('year_id')->nullable()->references('id')->on('years');
            $table->foreignId('semester_id')->nullable()->references('id')->on('semesters');
            $table->foreignId('organization_id')->references('id')->on('organizations');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
