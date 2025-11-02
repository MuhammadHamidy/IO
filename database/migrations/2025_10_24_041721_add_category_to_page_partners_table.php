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
        Schema::table('page_partners', function (Blueprint $table) {
            $table->enum('category', ['University', 'Organization', 'Embassy', 'Government Agency', 'Company'])->nullable()->after('regional');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('page_partners', function (Blueprint $table) {
            $table->dropColumn('category');
        });
    }
};
