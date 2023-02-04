<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servise extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'defect_id'
    ];
    // связь с ремонтом
    public function repair(){
        return $this->hasMany(Repair::class);
    }
    // связь с неисправностью
    public function  defect(){
        return $this->bolongsTo(Defect::class);
    }
}
