<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PokemonCapturedEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public string $uuid;
    public string $species;
    public string $species_id;
    public bool $shiny;
    public string $nickname;
    public string $gender;
    public string $form;
    public string $capturedBall;
    public string $originalTrainerUuid;
    public bool $isLegendary;
    public array $types;
    public int $level = 1;

    public function __construct(array $data)
    {
        $this->uuid = $data['pokemon_uuid'];
        $this->species = $data['pokemon_species'];
        $this->species_id = $data['pokemon_species_id'];
        $this->shiny = filter_var($data['pokemon_shiny'], FILTER_VALIDATE_BOOLEAN);
        $this->nickname = $data['pokemon_nickname'];
        $this->gender = $data['pokemon_gender'];
        $this->form = $data['pokemon_form'];
        $this->capturedBall = $data['pokemon_capturedBall'];
        $this->originalTrainerUuid = $data['pokemon_originalTrainer'];
        $this->isLegendary = $data['pokemon_is_legendary'];
        $this->types = $data['pokemon_types'];
        $this->level = $data['pokemon_level'] ?? 1;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): Channel
    {
        return new Channel('cobblemon');
    }

    public function broadcastAs(): string
    {
        return 'pokemon.captured';
    }
}
