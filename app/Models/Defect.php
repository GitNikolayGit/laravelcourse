<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Defect extends Model
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
