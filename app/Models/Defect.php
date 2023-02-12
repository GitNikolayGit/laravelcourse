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
    // связь с профессией
    public function profession(){
        return $this->hasMany(Profession::class);
    }
    public function service(){
        return $this->hasMany(Service::class);
    }
    public function park(){
        return $this->hasMany(Park::class);
    }
}
