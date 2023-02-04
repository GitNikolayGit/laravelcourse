<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',           // год выпуска
        'num',            // номер
        'surname',        // владелец
        'firstName',
        'patronymic',
        'brand_id',       // марка авто
        'modelСar_id',    // модель
        'color_id',       // цвет
        'defect_id',      // неисправности
    ];
    // связь с ремонтом
    public function repair(){
        return $this->hasMany(Repair::class);
    }
    // модель
    public function  brand(){
        return $this->bolongsTo(ModelCar::class);
    }
    // цвет
    public function  color(){
        return $this->bolongsTo(Color::class);
    }
    // неисправность
    public function  defect(){
        return $this->bolongsTo(Defect::class);
    }
}
