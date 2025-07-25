<?
namespace App\Http\Services;

use App\Models\Pokemon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PokemonServices
{
    public function search(Request $request)
    {
        $q    = (string) $request->input('q', '');
        $page = (int) $request->input('page', 1);
        $perPage = 151;

        $query = Pokemon::query();

        if ($q !== '') {
            $query->where('species', 'like', "%{$q}%");
        }

        $paginator = $query
            ->orderBy('pokedex_number')
            ->paginate($perPage, ['*'], 'page', $page);

        $data = $paginator->getCollection()->map(function ($p) {
            $sprites = json_decode($p->sprites, true);

            return [
                'code'   => $p->id, // o $p->pokedex_number si prefieres
                'label'  => Str::ucfirst($p->species),
                'sprite' => $sprites['front_default'] ?? null,
            ];
        });

        return response()->json([
            'data'     => $data,
            'next_page' => $paginator->hasMorePages() ? $page + 1 : null,
            'has_more' => $paginator->hasMorePages(),
        ]);
    }
}