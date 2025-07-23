<?php

namespace App\Listeners;

use App\Events\TrainerSyncEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\PokemonCapture;
use App\Models\User;

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

        if(!empty($event->pokemons) && !empty($trainer)){
            foreach ($event->pokemons as $pokemon) {
                PokemonCapture::updateOrCreate(
                [
                    'uuid' => $pokemon['pokemon_uuid'],
                ],
                [
                    'uuid' => $pokemon['pokemon_uuid'],
                    'species' => $pokemon['pokemon_species'],
                    'species_id' => $pokemon['pokemon_species_id'],
                    'shiny' => filter_var($pokemon['pokemon_shiny'], FILTER_VALIDATE_BOOLEAN),
                    'nickname' => $pokemon['pokemon_nickname'],
                    'gender' => $pokemon['pokemon_gender'],
                    'form' => $pokemon['pokemon_form'],
                    'captured_ball' => $pokemon['pokemon_capturedBall'],
                    'original_trainer_uuid' => $pokemon['pokemon_originalTrainer'],
                    'is_legendary' => $pokemon['pokemon_is_legendary'],
                    'types' => json_encode($pokemon['pokemon_types']),
                    'level' => $pokemon['pokemon_level'],
                    'user_id' => $trainer->id,
                    'in_team' => $pokemon['pokemon_team'],
                ]);
            }
        }
    }
}
