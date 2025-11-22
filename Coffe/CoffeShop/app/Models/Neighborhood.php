<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Neighborhood extends Model
{
    use HasFactory;

    protected $table = 'neighborhoods';
    
    protected $fillable = ['name'];

    // Отключаем автоматические timestamps если используем свои поля
    public $timestamps = true;

    public function cafes()
    {
        return $this->hasMany(Cafe::class, 'neighborhood_id');
    }
}