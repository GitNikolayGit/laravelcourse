<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'time',
        'price',
        'defect_id'
    ];
    // связь с ремонтом
    public function repair(){
        return $this->hasMany(Repair::class);
    }
    // связь с неисправностью
    public function  defect(){
        return $this->belongsTo(Defect::class);
    }
}
