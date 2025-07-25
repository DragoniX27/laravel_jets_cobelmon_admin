<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Events\PokemonCapturedEvent;
//use App\Events\PokemonEvolvedEvent;
use App\Events\TrainerSyncEvent;
// Agrega más eventos aquí según vayas creándolos
use Predis\Client as PredisClient;

class RedisListen extends Command
{
    protected $signature = 'redis:listen';
    protected $description = 'Escucha eventos de Redis enviados por el servidor de Minecraft';

    public function handle()
    {
        while (true) {
            try {
                $this->info('🎧 Escuchando múltiples canales Redis: cobblemon.*');

                $redis = new PredisClient([
                    'scheme' => 'tcp',
                    'host'   => config('database.redis.default.host', '127.0.0.1'),
                    'port'   => config('database.redis.default.port', 6379),
                ]);

                $pubsub = $redis->pubSubLoop();
                $pubsub->psubscribe('cobblemon.*'); // Usa patrón para todos los canales cobblemon.*

                foreach ($pubsub as $message) {
                    if ($message->kind === 'pmessage') {
                        $channel = $message->channel;
                        $payload = $message->payload;

                        $this->info("📩 Evento recibido en [$channel]:");

                        $data = json_decode($payload, true);
                        if (!is_array($data)) {
                            \Log::warning("❗ Mensaje inválido recibido en $channel");
                            continue;
                        }

                        match ($channel) {
                            //'cobblemon.pokemon_captured' => event(new PokemonCapturedEvent($data)),
                            //'cobblemon.pokemon_evolved' => event(new PokemonEvolvedEvent($data)),
                            'cobblemon.syncPlayer' => event(new TrainerSyncEvent($data)),
                            // agrega más eventos aquí
                            default => \Log::info("⚠️ Canal no manejado aún: $channel"),
                        };
                    }
                }

                $pubsub->punsubscribe();
            } catch (\Exception $e) {
                \Log::error("💥 Error en Redis listener: " . $e->getMessage());
                $this->error("💥 Error: {$e->getMessage()}");
                sleep(5); // Espera 5 segundos antes de reintentar
            }
        }
    }
}
