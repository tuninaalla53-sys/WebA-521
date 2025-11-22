<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roaster extends Model
{
    use HasFactory;

    protected $table = 'roasters';
    
    protected $fillable = ['name', 'description'];

    public $timestamps = true;

    public function beans()
    {
        return $this->hasMany(Bean::class, 'roaster_id');
    }
}