<?php

namespace App\Console\Commands;

use App\Message;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class DeleteRecentMessages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:messages';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete one day old messages';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $messages = Message::where('created_at', '<=', Carbon::now()->subDays(1)->toDateTimeString())->get();
        foreach ($messages as $message) {
            $message->delete();
        }
        Log::info('Messages that old then one day hes been deleted');
    }
}
