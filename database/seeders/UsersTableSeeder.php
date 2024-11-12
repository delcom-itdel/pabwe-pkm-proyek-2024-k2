<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Membuat akun admin
        User::create([
            'id' => 1,
            'name' => 'User Admin',
            'email' => 'admin@del.ac.id',
            'email_verified_at' => now(),
            'role' => 'Admin',
            'password' => Hash::make('admin'),
            'remember_token' => Str::random(10),
        ]);

        // Membuat akun editor tetap
        User::create([
            'name' => 'User Editor',
            'email' => 'editor@del.ac.id',
            'email_verified_at' => now(),
            'role' => 'Editor',
            'password' => Hash::make('editor'),
            'remember_token' => Str::random(10),
        ]);

        // Membuat 4 akun editor secara random menggunakan factory
        User::factory()->count(4)->create();
    }
}
