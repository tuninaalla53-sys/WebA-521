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
        'image'
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Accessor для получения URL изображения
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            // Кодируем пробелы в названии файла для корректного URL
            $encodedImageName = str_replace(' ', '%20', $this->image);
            return asset('images/products/' . $encodedImageName);
        }
        return asset('images/products/default.jpg');
    }
}