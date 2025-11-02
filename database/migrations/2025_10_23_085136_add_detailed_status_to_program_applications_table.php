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
        Schema::table('program_applications', function (Blueprint $table) {
            $table->string('current_stage')->default('submitted')->after('status');
            $table->text('admin_notes')->nullable()->after('notes');
            $table->timestamp('stage_updated_at')->nullable()->after('reviewed_at');
            $table->json('stage_history')->nullable()->after('stage_updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('program_applications', function (Blueprint $table) {
            $table->dropColumn(['current_stage', 'admin_notes', 'stage_updated_at', 'stage_history']);
        });
    }
};
