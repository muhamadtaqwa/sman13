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
        Schema::table('attendance_logs', function (Blueprint $table) {
            $table->index('created_at', 'idx_att_logs_created_at');
            $table->index(['nis', 'created_at'], 'idx_att_logs_nis_created_at');
            $table->index(['id_kegiatan', 'created_at'], 'idx_att_logs_kegiatan_created_at');
            $table->index('status_kehadiran', 'idx_att_logs_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('attendance_logs', function (Blueprint $table) {
            $table->dropIndex('idx_att_logs_created_at');
            $table->dropIndex('idx_att_logs_nis_created_at');
            $table->dropIndex('idx_att_logs_kegiatan_created_at');
            $table->dropIndex('idx_att_logs_status');
        });
    }
};
