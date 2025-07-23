<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Predis\Client as PredisClient;

class ListenForPokemonList extends Command
{
    protected $signature = 'pokemon:listen';
    protected $description = 'Escucha el canal de Redis para nuevos Pokémon capturados';

    public function handle()
    {
        $this->info('Escuchando el canal de Redis: cobblemon:pokemon_captured');

        $client = new PredisClient([
            'scheme' => 'tcp',
            'host'   => config('database.redis.default.host', 'redis'),
            'port'   => config('database.redis.default.port', 6379),
        ]);

        $pubsub = $client->pubSubLoop();
        $pubsub->subscribe('cobblemon.pokemon_captured');

        foreach ($pubsub as $message) {
            if (isset($message->payload)) {
                $data = json_decode($message->payload, true);

                if (json_last_error() === JSON_ERROR_NONE && is_array($data)) {
                    $this->line("📦 Mensaje recibido:");
                    $this->line(json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                } else {
                    $this->error("❌ Error al decodificar JSON: " . json_last_error_msg());
                    $this->line("Mensaje crudo:");
                    $this->line($message->payload);
                }
            }
        }

        // Cerrar el loop al salir
        $pubsub->unsubscribe();
    }
}
