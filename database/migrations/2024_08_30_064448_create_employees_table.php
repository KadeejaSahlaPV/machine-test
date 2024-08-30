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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('gender')->default(1)->comment('1:Male,2:Female,3:Others');
            $table->date('dob')->nullable();
            $table->text('address')->nullable();
            $table->integer('mobile')->nullable();
            $table->string('email');
            $table->foreignId('department_id')->references('id')->on('departments');
            $table->foreignId('designation_id')->references('id')->on('designations');
            $table->date('doj')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
