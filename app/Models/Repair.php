<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repair extends Model
{
    use HasFactory;
    protected $fillable = [
        'service_id',        // оказанная услуга
        'car_id',
        'worker_id',
        'client_id',
        'Park_id',
        //'datestart' ,         // поставка на ремонт
        'datereturn',        // дата возврата
    ];
    // связь с услугой
    public function service(){
        return $this->bolongsTo(Car::class);
    }

    // связь с машиной
    public function car(){
        return $this->bolongsTo(Car::class);
    }
    // связь с клиентом
    public function  client(){
        return $this->bolongsTo(Client::class);
    }
    // связь с запчастью
    public function  park(){
        return $this->bolongsTo(Client::class);
    }
}
