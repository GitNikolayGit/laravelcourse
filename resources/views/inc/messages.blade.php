@if (session('success'))
    <div class="alert alert-success w-100" style="text-align: center">
        {{session('success')}}
            <?php
            header("refresh: 3;");
            ?>
    </div>
@endif



@if($errors->any())
    <div class='alert alert-danger w-100' style="text-align: center">
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
                <?php
                header("refresh: 3;");
                ?>
    </div>
@endif
