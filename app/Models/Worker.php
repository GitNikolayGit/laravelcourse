<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;
    protected $with = ['profession'];
    protected $fillable = [
        'surname',
        'firstName',
        'patronymic',
        'category',    // разряд
        'experience',  // стаж
        'profession_id',  // специальность
    ];
    public function  profession(){
        return $this->belongsTo(Profession::class);
    }
    public function repair(){
        return $this->hasMany(Repair::class);
    }
}
