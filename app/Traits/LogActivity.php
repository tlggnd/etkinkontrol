<?php

namespace App\Traits;

use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

trait LogActivity
{
    public static function bootLogActivity()
    {
        static::created(function ($model) {
            self::logActivity('create', $model);
        });

        static::updated(function ($model) {
            self::logActivity('update', $model);
        });

        static::deleted(function ($model) {
            self::logActivity('delete', $model);
        });
    }

    protected static function logActivity(string $action, $model)
    {
        // Giriş yapmış bir kullanıcı var mı kontrol et
        if (Auth::check()) {
            $user = Auth::user();  // $request->user() yerine doğrudan Auth::user()
            $userId = $user->id;
        } else {
            $userId = null; // Kullanıcı giriş yapmamışsa
        }

        $oldValues = [];
        $newValues = [];

        if ($action === 'update') {
            $oldValues = $model->getOriginal(); // Modelin orijinal (veritabanındaki) değerleri
            $newValues = $model->getChanges(); // Modelde yapılan değişiklikler
            // Şifre gibi hassas verileri loglamamak için filtreleme yap
            $oldValues = self::filterSensitiveData($oldValues);
            $newValues = self::filterSensitiveData($newValues);
        } elseif ($action === 'create') {
            $newValues = $model->toArray();
            $newValues = self::filterSensitiveData($newValues);
        }


        ActivityLog::create([
            'user_id' => $userId,
            'model_type' => get_class($model),
            'model_id' => $model->getKey(), // Modelin primary key'i (genellikle id)
            'action' => $action,
            'description' => self::getDescription($action, $model), // Açıklama oluştur
            'old_values' => $oldValues,
            'new_values' => $newValues,
            'ip_address' => Request::ip(),  // Doğrudan Request facade'ini kullan
            'user_agent' => Request::userAgent(), // Doğrudan Request facade'ini kullan
        ]);
    }

    protected static function getDescription(string $action, $model): string
    {
        $modelName = class_basename($model);
        switch ($action) {
            case 'create':
                return "{$modelName} oluşturuldu.";
            case 'update':
                return "{$modelName} güncellendi.";
            case 'delete':
                return "{$modelName} silindi.";
            default:
                return "{$modelName} üzerinde işlem yapıldı.";
        }
    }

    // Hassas verileri (şifre vb.) loglamamak için
    protected static function filterSensitiveData(array $data): array
    {
        $sensitiveFields = ['password', 'password_confirmation', 'remember_token']; // Filtrelenecek alanlar
        return array_diff_key($data, array_flip($sensitiveFields));
    }
}