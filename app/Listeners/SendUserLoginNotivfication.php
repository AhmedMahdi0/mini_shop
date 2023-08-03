<?php

namespace App\Listeners;

use App\Events\UserLoginLog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class SendUserLoginNotivfication implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserLoginLog $event): void
    {
        DB::table('user_history')->insert([
            'name' => $event->user->username,
            'email' => $event->user->email,
            'created_at' => now()
        ]);
    }

    public $queue = 'listeners';

}
