<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'short_text', 
        'article', 
        'image', 
        'image_name'
    ];

    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return 'data:image/jpeg;base64,' . base64_encode($this->image);
        }
        return null;
    }
}