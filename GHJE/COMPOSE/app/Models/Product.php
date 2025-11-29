<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description', 
        'price',
        'image' // Добавляем поле image
    ];

    /**
     * Отношение: продукт имеет много комментариев
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Accessor для получения полного URL изображения
     */
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('storage/' . $this->image);
        }
        return asset('images/placeholder.jpg');
    }
}