<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\PageNews;

class ShowNewsCover extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:news-cover {id?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Show cover path and generated public URL for a PageNews (by id or first)';

    public function handle(): int
    {
        $id = $this->argument('id');

        $news = $id ? PageNews::find($id) : PageNews::first();

        if (!$news) {
            $this->error('No PageNews found' . ($id ? " with id $id" : ''));
            return 1;
        }

        $cover = $news->cover;
        $this->info('News ID: ' . $news->id);
        $this->info('Title: ' . $news->title);
        $this->info('Cover column value: ' . ($cover ?? '(null)'));

        if ($cover) {
            $appUrl = rtrim(config('app.url') ?? env('APP_URL', ''), '/');
            $url = $appUrl . '/storage/' . ltrim($cover, '/');
            $this->info('Generated URL: ' . $url);
            if (\Illuminate\Support\Facades\Storage::disk('public')->exists($cover)) {
                $this->info('File exists on storage disk public');
            } else {
                $this->warn('File does NOT exist on storage disk public');
            }
        }

        return 0;
    }
}
