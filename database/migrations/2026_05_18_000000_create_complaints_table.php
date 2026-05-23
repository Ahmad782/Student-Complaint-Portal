<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->string('roll_no');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('department');
            $table->string('semester')->nullable();
            $table->string('category');
            $table->string('priority')->default('Normal');
            $table->string('subject');
            $table->text('description');
            $table->string('status')->default('Pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};
