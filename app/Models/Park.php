<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Park extends Model
{
    use HasFactory;
    protected $fillable = [
        'modelcar_id',          // id - brand, model, defect, park
        'title',
        'price',
        'defect_id'
    ];
    public function  modelcar(){
        return $this->belongsTo(Modelcar::class);
    }
    //
    public function  defect(){
        return $this->belongsTo(Defect::class);
    }
    //
    public function repair(){
        return $this->hasMany(Park::class);
    }
}
