<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelcar extends Model
{
    use HasFactory;

    protected $with = ['brand'];

    protected $fillable = [
        'brand_id',
        'title',
    ];
    // связь с машиной
    public function car(){
        return $this->hasMany(Car::class);
    }
    //
    public function park(){
        return $this->hasMany(Park::class);
    }
    public function  brand(){
        return $this->belongsTo(Brand::class);
    }
}
