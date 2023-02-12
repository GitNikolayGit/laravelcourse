<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'surname',
        'firstName',
        'patronymic',
        'passport',
        'birhday',         // год рождения
        'address',         // прописка
    ];
    // связь с repair
    public function application(){
        return $this->hasMany(Application::class);
    }
}
