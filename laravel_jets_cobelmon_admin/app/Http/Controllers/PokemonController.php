<?

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\PokemonServices;

class PokemonController extends Controller
{
    private PokemonServices $service;

    public function __construct(PokemonServices $service) {
        $this->service = $service;
    }

    public function search(Request $request){
        return $this->service->search($request);
    }
}
