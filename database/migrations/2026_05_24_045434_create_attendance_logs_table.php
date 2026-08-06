<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('attendance_logs', function (Blueprint $table) {
            $table->id();
            $table->string('nis', 20);
            $table->foreignId('id_kegiatan')->constrained('activities')->onDelete('cascade');
            $table->foreignId('id_petugas')->nullable()->constrained('users')->onDelete('set null');
            $table->enum('status_kehadiran', ['Hadir', 'Sakit', 'Izin', 'Alpa']);
            $table->text('keterangan')->nullable();
            $table->timestamps();

            // Relasi ke tabel students
            $table->foreign('nis')->references('nis')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance_logs');
    }
};
