<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class FormSettingsSeeder extends Seeder
{
    public function run()
    {
        $settings = [
            [
                'key' => 'title',
                'value' => 'Varsayılan Site Başlığı',
            ],
            [
                'key' => 'description',
                'value' => 'Varsayılan Site Açıklaması',
            ],
            [
                'key' => 'keywords',
                'value' => 'anahtar kelime 1, anahtar kelime 2',
            ],
            [
                'key' => 'google_analytics',
                'value' => '<script>console.log("Google Analytics kodu");</script>',
            ],
            [
                'key' => 'footer_text',
                'value' => 'Varsayılan footer metni',
            ],
            [
                'key' => 'copyright',
                'value' => '© 2024 Şirket Adı',
            ],
            [
                'key' => 'phone',
                'value' => '123-456-7890',
            ],
            [
                'key' => 'gsm',
                'value' => '0555-123-4567',
            ],
            [
                'key' => 'fax',
                'value' => '123-456-7891',
            ],
            [
                'key' => 'email',
                'value' => 'info@example.com',
            ],
            [
                'key' => 'address',
                'value' => 'Örnek Mah. Örnek Sok. No:1',
            ],
            [
                'key' => 'google_maps',
                'value' => '<iframe src="https://www.google.com/maps/embed..."></iframe>',
            ],
            [
                'key' => 'facebook',
                'value' => 'https://www.facebook.com/example',
            ],
            [
                'key' => 'twitter',
                'value' => 'https://twitter.com/example',
            ],
            [
                'key' => 'instagram',
                'value' => 'https://www.instagram.com/example',
            ],
            [
                'key' => 'linkedin',
                'value' => 'https://www.linkedin.com/company/example',
            ],
            [
                'key' => 'youtube',
                'value' => 'https://www.youtube.com/example',
            ],
            [
                'key' => 'smtp_host',
                'value' => 'smtp.example.com',
            ],
            [
                'key' => 'smtp_port',
                'value' => '587',
            ],
            [
                'key' => 'smtp_mail',
                'value' => 'mail@example.com',
            ],
            [
                'key' => 'smtp_password',
                'value' => 'gizli_sifre',
            ],
            [
                'key' => 'smtp_ssl',
                'value' => '1', // 1: Evet, 0: Hayır
            ],
            [
                'key' => 'smtp_to_mail',
                'value' => 'iletisim@example.com',
            ],
            [
                'key' => 'smtp_subject',
                'value' => 'İletişim Formu',
            ],
            [
                'key' => 'smtp_company',
                'value' => 'Şirket Adı',
            ],
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }
}