<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // Поля, которые можно массово назначать
    protected $fillable = [
        'product_id',
        'user_id', 
        'comment'
    ];

    // Связь "принадлежит" с продуктом
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Связь "принадлежит" с пользователем
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}