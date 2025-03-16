<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin kullanıcısı
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('123456'), // Şifre: password
            'is_admin' => true, // Admin yetkisi
        ]);

        // Normal kullanıcı (örnek)
        User::factory()->create([
            'name' => 'Normal User',
            'email' => 'user@example.com',
            'password' => Hash::make('password'), // Şifre: password
            'is_admin' => false, // Admin yetkisi yok
        ]);

        // İsteğe bağlı: 10 adet rastgele normal kullanıcı
     

        // İsteğe bağlı: Belirli özelliklere sahip rastgele kullanıcılar
        // User::factory()->count(5)->create([
        //    'is_admin' => true,
        // ]);
    }
}