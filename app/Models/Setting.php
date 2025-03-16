<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\LogActivity; // Trait'i ekle

class Setting extends Model
{
    use HasFactory;
    use LogActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'key',
        'value',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        // Genellikle settings tablosunda gizlenecek bir alan olmaz.
        // Eğer gizlenmesi gereken özel bir durum varsa buraya eklenebilir.
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        // Genellikle settings tablosunda özel bir tür dönüşümü gerekmez.
        // İhtiyaç duyulursa, örneğin JSON formatında saklanan bir değer için
        // 'value' => 'json',  gibi bir dönüşüm eklenebilir.
        //'created_at' => 'datetime:Y-m-d H:i:s', // Örnek tarih formatı
        //'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true; // created_at ve updated_at sütunları kullanılacak.

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id'; // Modelin primary key'i (varsayılan olarak 'id').

    /**
     * The table associated with the model.
     *
     * @var string
     */
     protected $table = 'settings'; // Modelin ilişkili olduğu tablo adı (varsayılan olarak model adının çoğul hali).
}