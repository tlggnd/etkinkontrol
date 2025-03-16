<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LogoSettingsSeeder extends Seeder
{
    public function run()
    {
        DB::table('settings')->insert([
            [
                'key' => 'dark_logo',
                'value' => 'logos/dark-logo.png', // Varsayılan logo yolu
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'light_logo',
                'value' => 'logos/light-logo.png', // Varsayılan logo yolu
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'favicon',
                'value' => 'logos/favicon.ico', // Varsayılan favicon yolu
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}