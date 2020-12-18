<?php

namespace App\Console\Commands;

use App\Models\Payment as ModelsPayment;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class Schedule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'minute:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scheduler for db';

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
     * @return mixed
     */
    public function handle()
    {
        $exp = ModelsPayment::find(2);
        $awal  = time(); //waktu awal
        $akhir = strtotime($exp->expired_at); //waktu akhir
        $diff  = $akhir - $awal;
        $jam   = floor($diff / (60 * 60));

        if($jam <= '1' && $exp->status == '0')
        {
            echo "Mission Complete";
            $exp->update(['status' => '1' ]);
        }else{
            echo "Mission Failed";
        }
    }
}
