<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'car_id',
        'date_start'       // дата принятия заявки
    ];
    // связь с ремонтом
    public function repair(){
        return $this->hasMany(Repair::class);
    }
    // связь с клиентом
    public function client(){
        return $this->belongsTo(Client::class);
    }
    // связь с машиной
    public function car(){
        return $this->belongsTo(Car::class);
    }
}
