<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $with = [
        'defect'
    ];
    protected $fillable = [
        'date',           // год выпуска
        'num',            // номер
        'surname',        // владелец
        'firstName',
        'patronymic',
        //'brand_id',       // марка авто
        'modelcar_id',    // модель
        'color_id',       // цвет
        'defect_id',      // неисправности
    ];
    // связь с заявкой
    public function application(){
        return $this->hasMany(Application::class);
    }
    // модель
    public function  modelcar(){
        return $this->belongsTo(Modelcar::class);
    }
    // цвет
    public function  color(){
        return $this->belongsTo(Color::class);
    }
    // неисправность
    public function  defect(){
        return $this->belongsTo(Defect::class);
    }
}
