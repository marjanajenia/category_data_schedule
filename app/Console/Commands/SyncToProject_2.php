<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Category;
use Illuminate\Support\Facades\Http;

class SyncToProject_2 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sync-to-project_2';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Push Categories to Project 2';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $categories = Category::where('push_time', '<=', now())->get();

        $response = Http::post('http://project2.test/api/import_category', $categories->toArray());

        if ($response->successful()) {
            $this->info('Data synced to Project 2.');
        } else {
            $this->error('Failed to sync data.');
        }
    }

}
