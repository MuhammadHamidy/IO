<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('program_study')->nullable()->after('passport_number');
            $table->string('faculty')->nullable()->after('program_study');
            $table->string('student_id')->nullable()->after('faculty'); // NIM

            $table->string('cv_path')->nullable()->after('student_id');
            $table->string('transcript_path')->nullable()->after('cv_path');
            $table->string('toefl_path')->nullable()->after('transcript_path');
            $table->string('integrity_letter_path')->nullable()->after('toefl_path');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'program_study',
                'faculty',
                'student_id',
                'cv_path',
                'transcript_path',
                'toefl_path',
                'integrity_letter_path',
            ]);
        });
    }
};



