<?php

namespace App\Console;

use Illuminate\Support\Facades\Mail;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Carbon\Carbon;

class Kernel extends ConsoleKernel {

    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
            //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule) {
        // $schedule->command('inspire')
        //          ->hourly();
        //$schedule->command('queue:listen')->everyFiveMinutes();
        // Run once a minute
        $schedule->call(function() {
            Mail::send('template/email/mailRFIndex', ['link' => 'http://www.relationflip.com/login?status=post', 'e_user' => '111'], function ($m) {
                $m->to('champ6803@gmail.com', 'คุณ ' . 'champ')->subject('แบบประเมินหลังการรับบริการ RF Analytical Counselling');
                $m->from('support@relationflip.com', 'Relationflip');
            });
        })->when(function () {
            if(Carbon::now()->format('Y-m-d H:i') == "2017-10-09 10:28"){
                return true;
            }
            return false;
        });

//            Mail::raw('schedule job', function ($message) use ($data) {
//                $message->from('example@mail.com', 'my name');
//                $message->subject('test  schedule');
//                $message->to('example@mail.com')->cc('example@mail.com');
//            });
//        })->everyMinute();
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands() {
        require base_path('routes/console.php');
    }

}
