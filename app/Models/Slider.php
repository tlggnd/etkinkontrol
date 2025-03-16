<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\LogActivity; // Trait'i ekle

class Slider extends Model
{
    use HasFactory, LogActivity; // Trait'i kullan


    protected $fillable = [
        'image',
        'title',
        'title_active',
        'subtitle',
        'subtitle_active',
        'button_text',
        'button_color',
        'button_link',
        'button_active',
        'order',
    ];

     protected $casts = [
        'title_active' => 'boolean',
        'subtitle_active' => 'boolean',
        'button_active' => 'boolean',
    ];
}