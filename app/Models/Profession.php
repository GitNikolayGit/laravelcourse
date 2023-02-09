<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'defect_id'
    ];
    // связь с машиной
    public function worker(){
        return $this->hasMany(Worker::class);
    }
    // связь с неисправностью
    public function  defect(){
        return $this->belongsTo(Defect::class);
    }
}
