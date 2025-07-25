<?php

namespace App\Listeners;

use App\Events\TrainerSyncEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\PlayerSession;
use App\Models\User;
use Carbon\Carbon;

class TrainerSyncListener
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
    public function handle(TrainerSyncEvent $event): void
    {
        $trainer = User::select('id')->where('uuid', $event->uuid)->first();

        if (!$trainer) {
            \Log::warning("TrainerSyncListener: Usuario con UUID {$event->uuid} no encontrado.");
            return;
        }

        // Obtener el inicio del día y la hora actual
        $now = Carbon::now();
        $startOfDay = $now->copy()->startOfDay();
        $tenMinutesAgo = $now->copy()->subMinutes(10);

        // Consulta
        $session = PlayerSession::where([
                ['user_id', $trainer->id],
                ['start_at', '>=', $startOfDay],
                ['end_at', '>=', $tenMinutesAgo],
                ['end_at', '<=', $now]
            ])->first();

        if(!empty($session)){
            $session->update([
                'end_at' => $now
            ]);
        }else{
            PlayerSession::create([
                'user_id' => $trainer->id,
                'start_at' => $now,
                'end_at' => $now
            ]);
        }
    }
}
