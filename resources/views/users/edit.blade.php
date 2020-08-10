@extends('layouts.app')


@section('content')



    <div class="card">
        <div class="card-header"><b>My Profile</b></div>
        <div class="card-body">

            @include('partials.errors')

           {!! Form::model($user,['method'=>'PATCH', 'action'=>['UsersController@update', $user->id]]) !!}

            <div class="form-group">
                {!! Form::label('name','Name') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('about','About') !!}
                {!! Form::textarea('about', null, ['class'=>'form-control', 'rows'=>3]) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Update', ['class'=>'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}

        </div>
    </div>

@endsection
