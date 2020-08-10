@extends('layouts.app')


@section('content')

    <div class="d-flex justify-content-end mb-2">
        <a href="" class="btn btn-success btn-sm">Create User</a>
    </div>

<div class="card">
    <div class="card-header"><b>Users</b></div>
    <div class="card-body">
        @if(count($users) > 0)
        <div class="table-responsive">
            <table class="table table-hover table-sm">
             <thead>
             <tr>
                 <th>Image</th>
                 <th>Name</th>
                 <th>E-mail</th>
                 <th>Role</th>
                 <th>Created</th>
                 <th></th>
             </tr>
             </thead>

        <tbody>

        @foreach($users as $user)

            <tr>
                <td>
                    <img height="40" width="40" style="border-radius: 50%;" src="{{ Gravatar::src($user->email) }}" alt="">
                </td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>{{ $user->created_at->diffForHumans() }}</td>
                <td>
                    @if($user->role == 'admin')

                        {!! Form::open(['method'=>'PUT', 'action'=>['UsersController@role', $user->id]]) !!}
                        {!! Form::submit('Make Writer', ['class'=>'btn btn-sm btn-success']) !!}
                        {!! Form::close() !!}

                    @else

                        {!! Form::open(['method'=>'PUT', 'action'=>['UsersController@role', $user->id]]) !!}
                        {!! Form::submit('Make Admin', ['class'=>'btn btn-sm btn-info']) !!}
                        {!! Form::close() !!}

                    @endif

                </td>

            </tr>

        @endforeach


        </tbody>


            </table>
        </div>
            @else

            <h3 class="text-center">No User Found</h3>

        @endif
    </div>
</div>

@endsection
