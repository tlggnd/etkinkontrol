<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage; // Storage facade'ını ekledik

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->pluck('value', 'key')->toArray();
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        try {
            foreach ($request->except(['_token', 'dark_logo', 'light_logo', 'favicon']) as $key => $value) {
                Setting::updateOrCreate(['key' => $key], ['value' => $value]); // updateOrCreate kullanıldı
            }

            // Logo yükleme işlemleri (Storage facade'ı ile)
            if ($request->hasFile('dark_logo')) {
                $this->updateSettingWithFile($request, 'dark_logo');
            }

            if ($request->hasFile('light_logo')) {
                $this->updateSettingWithFile($request, 'light_logo');
            }

            if ($request->hasFile('favicon')) {
                 $this->updateSettingWithFile($request, 'favicon');
            }


            return response()->json(['success' => true, 'message' => 'Ayarlar başarıyla güncellendi.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Ayarlar güncellenirken bir hata oluştu: ' . $e->getMessage()]); //Hata mesajı detaylandırıldı.
        }
    }

    // Dosya yükleme ve güncelleme işlemini ayrı bir fonksiyona taşıdık
    private function updateSettingWithFile(Request $request, string $settingKey) {
        $file = $request->file($settingKey);
        $path = $file->store('logos', 'public');  //dosyayı kaydet

        //Eski Dosyayı Sil (eğer varsa)
        $oldSetting = Setting::where('key', $settingKey)->first();
        if ($oldSetting && $oldSetting->value && Storage::disk('public')->exists($oldSetting->value)) {
            Storage::disk('public')->delete($oldSetting->value);
        }

        Setting::updateOrCreate(['key' => $settingKey], ['value' => $path]); //updateOrCreate kullan
    }
}