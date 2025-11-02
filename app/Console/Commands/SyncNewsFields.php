<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\PageNews;

class SyncNewsFields extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'news:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync news fields (is_publish, is_highlight) to ensure consistency';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting news fields synchronization...');
        
        $news = PageNews::all();
        $updatedCount = 0;
        
        foreach ($news as $item) {
            $needsUpdate = false;
            $updates = [];
            
            $shouldBePublished = ($item->status === 'published');
            if ($item->is_publish != $shouldBePublished) {
                $updates['is_publish'] = $shouldBePublished;
                $needsUpdate = true;
            }
            
            if ($item->featured != $item->is_highlight) {
                $updates['featured'] = $item->is_highlight;
                $needsUpdate = true;
            }
            
            if ($item->cover && !$item->image) {
                $updates['image'] = $item->cover;
                $needsUpdate = true;
            } elseif ($item->image && !$item->cover) {
                $updates['cover'] = $item->image;
                $needsUpdate = true;
            }
            
            if ($needsUpdate) {
                $item->update($updates);
                $updatedCount++;
                $this->line("Updated: {$item->title}");
            }
        }
        
        $this->info("Synchronization complete! Updated {$updatedCount} news items.");
        
        $highlighted = PageNews::where('is_highlight', true)
            ->where('is_publish', true)
            ->where(function($q){
                $q->where('status', 'published')->orWhereNull('status');
            })
            ->active()
            ->get();
            
        $this->info("\nCurrently highlighted news ({$highlighted->count()}):");
        foreach ($highlighted as $h) {
            $this->line("- {$h->title}");
        }
        
        return 0;
    }
}
