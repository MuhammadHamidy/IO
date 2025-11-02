<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\PageNews;
use Illuminate\Support\Facades\Storage;

class CheckNewsCovers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:news-covers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List PageNews records whose cover file is missing on storage disk public';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->info('Scanning page_news covers...');

        $missing = [];

        $news = PageNews::all();
        foreach ($news as $n) {
            $cover = $n->cover;
            if (empty($cover)) {
                $missing[] = [
                    'id' => $n->id,
                    'cover' => '(empty)',
                    'title' => $n->title,
                ];
                continue;
            }

            if (!Storage::disk('public')->exists($cover)) {
                $missing[] = [
                    'id' => $n->id,
                    'cover' => $cover,
                    'title' => $n->title,
                ];
            }
        }

        if (empty($missing)) {
            $this->info('All covers exist on storage disk public.');
            return 0;
        }

        $this->table([
            'ID', 'Cover', 'Title'
        ], array_map(function ($r) {
            return [$r['id'], $r['cover'], $r['title']];
        }, $missing));

        $this->warn(count($missing) . ' records with missing covers.');

        return 0;
    }
}
