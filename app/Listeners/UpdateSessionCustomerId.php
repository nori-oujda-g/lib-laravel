<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\DB;
use Log;
class UpdateSessionCustomerId
{
    public function __construct()
    {
    }
    public function handle(object $event): void
    {
        dd('salamo alaykom depuis UpdateSessionCustomerId');
        if ($event->user instanceof \App\Models\Customer) {
            $sessionId = session()->getId();
            DB::table('sessions')->where('id', $sessionId)->update([
                'user_id' => $event->user->getAuthIdentifier(),
            ]);
        }
        $sessionId = session()->getId();
        Log::info('Session ID:', ['id' => $sessionId]);
        Log::info('User ID:', ['user_id' => $event->user->getAuthIdentifier()]);

        DB::table('sessions')->where('id', $sessionId)->update([
            'user_id' => $event->user->getAuthIdentifier(),
        ]);
    }
}
