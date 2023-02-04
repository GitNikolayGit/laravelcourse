<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Park extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'defect_id'
    ];
    // связь с машиной
    public function car(){
        return $this->hasMany(Defect::class);
    }
    public function  defect(){
        return $this->bolongsTo(Defect::class);
    }
}
