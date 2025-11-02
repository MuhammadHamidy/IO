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
        Schema::table('users', function (Blueprint $table) {
            $table->string('place_of_birth')->nullable()->after('date_of_birth');
            $table->string('gpa')->nullable()->after('student_id');
            $table->string('year_semester')->nullable()->after('gpa');
            $table->string('religion')->nullable()->after('nationality');
            $table->date('passport_expiration_date')->nullable()->after('passport_number');
            $table->text('mailing_address')->nullable()->after('address');
            $table->string('toefl_score')->nullable()->after('toefl_path');
            $table->date('toefl_test_date')->nullable()->after('toefl_score');
            
            $table->string('parent_name')->nullable()->after('toefl_test_date');
            $table->string('parental_relationship')->nullable()->after('parent_name');
            $table->text('parent_address')->nullable()->after('parental_relationship');
            $table->string('parent_telephone')->nullable()->after('parent_address');
            $table->string('parent_mobile')->nullable()->after('parent_telephone');
            $table->string('parent_email')->nullable()->after('parent_mobile');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'place_of_birth',
                'gpa',
                'year_semester',
                'religion',
                'passport_expiration_date',
                'mailing_address',
                'toefl_score',
                'toefl_test_date',
                'parent_name',
                'parental_relationship',
                'parent_address',
                'parent_telephone',
                'parent_mobile',
                'parent_email',
            ]);
        });
    }
};
