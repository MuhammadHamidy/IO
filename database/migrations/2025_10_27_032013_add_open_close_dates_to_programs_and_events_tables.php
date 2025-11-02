<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->dateTime('open_date')->nullable()->after('status');
            $table->dateTime('close_date')->nullable()->after('open_date');
        });

        Schema::table('events', function (Blueprint $table) {
            $table->dateTime('open_date')->nullable()->after('date');
            $table->dateTime('close_date')->nullable()->after('open_date');
        });
    }

    public function down(): void
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->dropColumn(['open_date', 'close_date']);
        });

        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn(['open_date', 'close_date']);
        });
    }
};
