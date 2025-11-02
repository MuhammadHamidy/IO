<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $sql = File::get(database_path('sql/admission_io.sql'));

        $queries = array_filter(array_map('trim', explode(';', $sql)));

        foreach ($queries as $query) {
            DB::statement($query);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        DB::statement('DROP TABLE IF EXISTS admission_io');
    }
};
