@if (session('success'))
    <div class="alert alert-success w-100">
        {{session('success')}}
    </div>
@endif



@if($errors->any())
    <div class='alert alert-danger w-100'>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </div>
@endif
