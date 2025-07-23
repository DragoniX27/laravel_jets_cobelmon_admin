<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Spatie\Permission\Models\Role;

class UsersSeeder extends Seeder
{
    public function run(): void
    {

        $data = [
            "last_ip" => "172.18.0.1",
            "password" => Hash::make("DragoniX123"),
            "login_tries" => 0,
            "data_version" => 1,
            "online_account" => "TRUE",
            "last_kicked_date" => "1970-01-01T00:00:00Z",
            "registration_date" => Carbon::now()->toIso8601String() . "[Etc/UTC]",
            "last_authenticated_date" => Carbon::now()->toIso8601String() . "[Etc/UTC]",
        ];

        Role::create([
            'name' => 'admin'
        ]);

        User::create([
            'username' => 'DragoniX2700',
            'email' => 'santiagogil271@gmail.com',
            'username_lower' => 'dragonix2700',
            'password' => $data['password'],
            'data' => json_encode($data, JSON_UNESCAPED_SLASHES),
        ])->assignRole('admin');
    }
}