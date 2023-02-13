<table  class="table table-striped caption-top">
    <caption>запчасти</caption>
    <thead>
    <tr>
        <th>id</th>
        <th>Фото</th>
        <th>Модель</th>
        <th>Наименование</th>
        <th>Категория</th>
        <th>Цена</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($parks as $park)
        <tr>
            <td>{{$park->id}}</td>
            <td><img style="height: 80px" src="{{asset(file_exists("storage/images/park/".$park->id.".jpg")
                  ? "storage/images/park/".$park->id.".jpg" : "storage/images/park/noo.jpg")}}" alt="фото запчасти">
            </td>
            <td>{{$park->modelcar->brand->title.' '.$park->modelcar->title}}</td>
            <td>{{$park->title}}</td>
            <td>{{$park->defect->title}}</td>
            <td>{{$park->price}}</td>
            <td class="text-center">
                <a class="btn btn-outline-success" href="/park/edit/{{$park->id}}" title="Изменить...">
                    <i class="bi bi-pencil"></i>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
