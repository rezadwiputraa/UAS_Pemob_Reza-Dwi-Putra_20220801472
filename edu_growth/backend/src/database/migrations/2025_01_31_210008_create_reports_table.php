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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->string('name');
            $table->foreignId('client_id')->constrained('clients')->onDelete('cascade');
            $table->foreignId('course_id')->constrained('courses')->onDelete('cascade');
            $table->text('description')->nullable();
            $table->enum('pembelajaran', ['Online', 'Offline'])->default('Online');
            $table->enum('status', ['On Progress', 'Finished'])->default('On Progress');
            $table->timestamp('tanggal_jam')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};