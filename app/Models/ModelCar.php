<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelCar extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
    ];
    // связь с машиной
    public function car(){
        return $this->hasMany(Car::class);
    }
}
