
@if(count($errors) > 0)

    <div class="alert alert-danger">
        <a href="" class="close" data-dismiss="alert">x</a>
        @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach
    </div>

@endif
