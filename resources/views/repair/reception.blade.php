<div style="text-align: center">
<hr>
<h1>Автосервис</h1>
</div>
<hr>

    <p>Номер заявки : {{$repairs->first()->application->id}}</p>
    <p>Дата приема: {{$repairs->first()->application->date_start}}</p>
    <p>Неисправность: {{$repairs->first()->application->car->defect->title}}</p>
    <p>Время: {{$count}}</p>







