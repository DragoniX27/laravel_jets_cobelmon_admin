<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\PokemonCapturedEvent;
use App\Models\PokemonCapture;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

class PokemonCapturedListener
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
    public function handle(PokemonCapturedEvent $event): void
    {
        $user = User::select('id')->where('uuid', $event->originalTrainerUuid)->first();
        
        if(!empty($user)){
            PokemonCapture::create([
                'uuid' => $event->uuid,
                'species' => $event->species,
                'species_id' => $event->species_id,
                'shiny' => $event->shiny,
                'nickname' => $event->nickname,
                'gender' => $event->gender,
                'form' => $event->form,
                'captured_ball' => $event->capturedBall,
                'original_trainer_uuid' => $event->originalTrainerUuid,
                'is_legendary' => $event->isLegendary,
                'types' => json_encode($event->types),
                'level' => $event->level,
                'user_id' => $user?->id,
            ]);
        }
    }
}
