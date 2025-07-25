<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pokemon;
use Inertia\Inertia;
use App\Http\Services\UserRegisterServices;
use App\Http\Requests\RegisterTrainerRequest;

class UserRegisterController extends Controller
{
    private UserRegisterServices $service;

    public function __construct(UserRegisterServices $service) {
        $this->service = $service;
    }

    public function show()
    {
        return Inertia::render('Auth/Register');
    }

    public function store(RegisterTrainerRequest $request){
        $this->service->store($request);
    }
}
