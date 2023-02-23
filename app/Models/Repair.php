<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Repair extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'application_id',    // номер заявки
        'service_id',        // оказанная услуга
        'worker_id',         // работник
        'park_id',           // запчасть

        //'price',
        //'time_work',        // время работы
    ];
    // связь с заявкой
    public function application(){
        return $this->belongsTo(Application::class);
    }
    // связь с услугой
    public function service(){
        return $this->belongsTo(Service::class);
    }
    // связь с работником
    public function worker(){
        return $this->belongsTo(Worker::class);
    }
    // связь с запчастью
    public function  park(){
        return $this->belongsTo(Park::class);
    }
}
