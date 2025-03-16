<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ActivityLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'model_type',
        'model_id',
        'action',
        'description',
        'old_values',
        'new_values',
        'ip_address',
        'user_agent',
    ];

    protected $casts = [
        'old_values' => 'array',  // JSON sütunlarını array olarak cast et
        'new_values' => 'array',
    ];

    /**
     * Log kaydının ait olduğu kullanıcıyı getirir.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

     // İsteğe Bağlı: Model adını daha okunaklı hale getirmek için
    public function getModelNameAttribute()
    {
        if ($this->model_type) {
            return class_basename($this->model_type); // Örn: "User", "Product"
        }
        return null;
    }
}