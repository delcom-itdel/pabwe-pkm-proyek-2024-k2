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
        User::create(attributes: [
            'id' => 1,
            'name' => 'User Admin',
            'email' => 'admin@del.ac.id',
            'email_verified_at' => now(),
            'role' => 'Admin',
            'password' => Hash::make('admin'),
            'remember_token' => Str::random(10),
        ]);

        User::factory()->count(5)->create();
    }
}
