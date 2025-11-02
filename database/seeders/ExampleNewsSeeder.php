<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\PageNews;

class ExampleNewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dir = storage_path('app/public/covers');
        if (!File::exists($dir)) {
            File::makeDirectory($dir, 0755, true);
        }

        $source = public_path('img/1.png');
        $destRelative = 'covers/example.png';
        $dest = storage_path('app/public/' . $destRelative);

        if (File::exists($source) && !File::exists($dest)) {
            File::copy($source, $dest);
        }

        PageNews::updateOrCreate(
            ['slug' => 'example-news'],
            [
                'title' => 'Example News',
                'content' => '<p>This is an example news item created by ExampleNewsSeeder.</p>',
                'cover' => $destRelative,
                'is_publish' => true,
                'is_highlight' => true,
                'created_by' => null,
            ]
        );
    }
}
