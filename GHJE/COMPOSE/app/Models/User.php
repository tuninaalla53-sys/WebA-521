<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
    ];

    /**
     * Отношение: пользователь имеет много комментариев
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}