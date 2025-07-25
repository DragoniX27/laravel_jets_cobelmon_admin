<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Seeder;
use App\Models\Pokemon;

class PokemonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 9; $i++) {
            $response = Http::get("https://pokeapi.co/api/v2/generation/{$i}/");
            $speciesList = $response->json('pokemon_species');

            foreach ($speciesList as $species) {
                $speciesData = Http::get("https://pokeapi.co/api/v2/pokemon-species/{$species['name']}")
                    ->json();

                $speciesExtraData = Http::get("https://pokeapi.co/api/v2/pokemon/{$speciesData['id']}")->json();

                $forms = [];
                foreach ($speciesData['varieties'] as $variety) {
                    if(!$variety['is_default']) {
                        $form = explode('-', $variety['pokemon']['name']);
                        $formExtraData = Http::get($variety['pokemon']['url'])->json();
                        if(!empty(end($form))) {
                            $forms[] = ['form' => $form[1], 'sprites' =>  json_encode($formExtraData['sprites']), 'types' => $formExtraData['types']];
                        }
                    }
                }
                Pokemon::create([
                    'pokedex_number' => $speciesData['id'],
                    'species' => $species['name'],
                    'forms' => json_encode($forms),
                    'is_legendary' => ($speciesData['is_legendary'] || $speciesData['is_mythical']),
                    'sprites' =>  json_encode($speciesExtraData['sprites']),
                    'types' => json_encode($speciesExtraData['types']),
                    'generation' => $i
                ]);
            }

        }
    }
}
