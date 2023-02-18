<div style="text-align: center">
<hr>
<h1>Автосервис</h1>
</div>
<hr>

<p>Номер заявки : {{$repairs->first()->application->id}}</p>
<p>Дата приема: {{$repairs->first()->application->created_at}}</p>
<p>Неисправность: {{$repairs->first()->application->car->defect->title}}</p>
<p>Возвратить отремонтированный автомобиль: {{$time }}</p>







