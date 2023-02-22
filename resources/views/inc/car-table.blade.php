<table  class="table table-striped caption-top">
    <caption>машины</caption>
    <thead>
    <tr>
        <th>id</th>
        <th>Фото</th>
        <th>Год выпуска</th>
        <th>Номер</th>
        <th>Владелец</th>
        <th>Модель</th>
        <th>Цвет</th>
        <th>Неисправность</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($cars->sortByDesc('id') as $car)
        <tr>
            <td>{{$car[0]->application->car->id}}</td>
            <td><img style="height: 50px" src="{{asset(file_exists("storage/images/avto/".$car[0]->application->car->modelcar->brand_id.$car[0]->application->car->modelcar_id.".jpg")
                  ? "storage/images/avto/".$car[0]->application->car->modelcar->brand_id.$car[0]->application->car->modelcar_id.".jpg" : "storage/images/avto/noo.jpg")}}" alt="фото машины"></td>
            <td>{{$car[0]->application->car->date}}</td>
            <td>{{$car[0]->application->car->num}}</td>
            <td>{{$car[0]->application->car->surname. ' '.$car[0]->application->car->firstName. ' '.$car[0]->application->car->patronymic}}</td>
            <td>{{$car[0]->application->car->modelcar->brand->title. ' '.$car[0]->application->car->modelcar->title}}</td>
            <td>{{$car[0]->application->car->color->title}}</td>
            <td>{{$car[0]->application->car->defect->title}}</td>
            <td class="text-center">
                <a class="btn btn-success" href="/car/edit/{{$car[0]->application->car->id}}" title="Изменить...">
                    <i class="bi bi-pencil"></i>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
