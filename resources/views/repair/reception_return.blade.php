<div style="text-align: center">
    <hr>
    <h1>Автосервис</h1>
</div>
<hr>

<p>Номер заявки : {{$repairs->first()->application->id}}</p>
<p>Машина: <b>{{$repairs->first()->application->car->modelcar->brand->title}} {{$repairs->first()->application->car->modelcar->title}}</b> номер: <b>{{$repairs->first()->application->car->num}}</b></p>
<p></p>
<p>Поставлена на ремонт: {{$repairs->first()->application->created_at}}</p>
<hr>
<p>Неисправности</p>
<ul>
@foreach($service as $title => $value)
    <li>{{$title}}</li>
    <ul>
    @foreach($value as $key => $val)
        <li>{{$key}}:   {{$val}}</li>
    @endforeach
    </ul>
@endforeach
</ul>
<p>Запчасти</p>
<ul>
    @foreach($park as $title => $value)
        <li>{{$title}}: {{$value}}</li>
    @endforeach
</ul>
<hr>
<p>К оплате: {{$price}} руб.</p>
