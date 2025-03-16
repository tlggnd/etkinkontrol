<?php
// app/Models/Menu.php
// app/Models/Menu.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable; // Import the Sluggable trait


class Menu extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = ['name', 'slug', 'parent_id', 'order', 'is_active','url'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    // Relationship: A menu can have many children.
    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id')->orderBy('order');
    }

    // Relationship: A menu belongs to a parent (can be null for top-level menus).
    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }


     // Recursive function to get all children and their children
     public function allChildren()
     {
        return $this->children()->with('allChildren');
     }

    // Scope to get only active menus.
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope to get top-level menus (no parent).
    public function scopeTopLevel($query)
    {
        return $query->whereNull('parent_id');
    }
}
