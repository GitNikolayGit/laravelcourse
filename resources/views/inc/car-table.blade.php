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
    @foreach($cars as $car)
        <tr>
            <td>{{$car->id}}</td>
            <td><img style="height: 80px" src="{{asset(file_exists("storage/images/avto/".$car->modelcar->brand_id.$car->modelcar_id.".jpg")
                  ? "storage/images/avto/".$car->modelcar->brand_id.$car->modelcar_id.".jpg" : "storage/images/avto/noo.jpg")}}" alt="фото машины"></td>
            <td>{{$car->date}}</td>
            <td>{{$car->num}}</td>
            <td>{{$car->surname. ' '.$car->firstName. ' '.$car->patronymic}}</td>
            <td>{{$car->modelcar->brand->title. ' '.$car->modelcar->title}}</td>
            <td>{{$car->color->title}}</td>
            <td>{{$car->defect->title}}</td>
            <td class="text-center">
                <a class="btn btn-success" href="/car/edit/{{$car->id}}" title="Изменить...">
                    <i class="bi bi-pencil"></i>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
