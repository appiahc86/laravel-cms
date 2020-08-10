@extends('layouts.app')


@section('content')



    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">


                <div class="card">
                    <div class="card-header text-bold">{{ isset($tag) ? 'Edit Tag' : 'Create Tag' }}</div>
                    <div class="card-body">



                        @include('partials.errors')



                        @if(isset($tag))

                            {!! Form::model($tag,['method'=>'PATCH', 'action'=>['TagsController@update', $tag->id]]) !!}

                            <div class="form-group">
                                {!! Form::label('name', 'Name') !!}

                                {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Name']) !!}


                            </div>

                            <div class="form-group">
                                {!! Form::submit('Update', ['class'=>'btn btn-primary btn-sm']) !!}
                            </div>

                            {!! Form::close() !!}


                        @else

                            {!! Form::open(['method'=>'POST', 'action'=>'TagsController@store']) !!}

                            <div class="form-group">
                                {!! Form::label('name', 'Name') !!}

                                {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Name']) !!}


                            </div>

                            <div class="form-group">
                                {!! Form::submit('Create tag', ['class'=>'btn btn-success btn-sm']) !!}
                            </div>

                            {!! Form::close() !!}

                        @endif




                    </div>   {{--  ./card-body   --}}

                </div>   {{--  ./card --}}



            </div>
        </div>
    </div>

@endsection
