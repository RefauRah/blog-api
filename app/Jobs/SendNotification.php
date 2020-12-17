<?php

namespace App\Jobs;
use Illuminate\Support\Facades\DB;

class SendNotification extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        DB::table('posts')
        ->insert([
            'title' => 'default',
            'content' => 'default'
        ]);
    }
}
