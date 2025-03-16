<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\LogActivity;

class Page extends Model
{
    use HasFactory, LogActivity;
    
    public function pageable()
    {
        return $this->morphTo(); // Polimorfik ilişkiden gelen method
    }
}