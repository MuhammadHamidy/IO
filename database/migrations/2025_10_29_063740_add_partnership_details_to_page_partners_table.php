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
            $table->date('partnership_start_date')->nullable()->after('fact_sheet');
            $table->date('partnership_end_date')->nullable()->after('partnership_start_date');
            $table->text('cooperation_fields')->nullable()->after('partnership_end_date');
            $table->text('partnership_type')->nullable()->after('cooperation_fields'); // e.g., Student Exchange, Joint Research, etc.
            $table->text('contact_person')->nullable()->after('partnership_type');
            $table->string('contact_email')->nullable()->after('contact_person');
            $table->string('contact_phone')->nullable()->after('contact_email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('page_partners', function (Blueprint $table) {
            $table->dropColumn([
                'partnership_start_date',
                'partnership_end_date',
                'cooperation_fields',
                'partnership_type',
                'contact_person',
                'contact_email',
                'contact_phone',
            ]);
        });
    }
};
