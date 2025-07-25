<?

namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Models\UserRegister;
use Illuminate\Support\Facades\Hash;

class UserRegisterServices {

    public function store(Request $request){
        UserRegister::create([
            'username' => $request->input('username'),
            'username_lower' => strtolower($request->input('username')),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'password' => Hash::make($request->input('password')),
            'id_pk_fav' => $request->input('favorite_pokemon.code'),
            'id_pk2_fav' => $request->input('second_favorite_pokemon.code'),
            'lvl_minecraft' => $request->input('lvl_minecraft'),
            'lvl_pokemon' => $request->input('lvl_pokemon'),
            'description' => $request->input('reason'),
        ]);
    }
}