<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class DataSeeder extends Seeder
{
    public function run()
    {
        $path = database_path('sql/data.sql');

        if (File::exists($path)) {
            $sql = File::get($path);

            DB::unprepared($sql);
        } else {
            echo "File data.sql tidak ditemukan!";
        }
    }
}
