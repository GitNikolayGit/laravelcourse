<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Park extends Model
{
    use HasFactory;
    protected $fillable = [
        //'article',           // id марки модели неисправности
        'title',
        'price',
       // 'brand',
        //'modelCar',
       // 'defect_id'
    ];
    // связь с машиной
    public function car(){
        return $this->hasMany(Defect::class);
    }
}
