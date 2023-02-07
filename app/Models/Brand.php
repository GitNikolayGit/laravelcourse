<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
    ];
    // связь с моделью
    public function modelcar(){
        return $this->hasMany(Modelcar::class);
    }
}
