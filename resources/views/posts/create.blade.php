@extends('layouts.app')

@section('links')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

@endsection


@section('content')


                @if(isset($post))


                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">


                                <div class="card">
                                    <div class="card-header"><b>Edit Post</b></div>
                                    <div class="card-body overflow-auto">


                                        @include('partials.errors')


                                        {!! Form::model($post,['method'=>'PATCH', 'action'=>['PostsController@update',$post->id], 'files'=>true]) !!}

                                        <div class="form-group">
                                            {!! Form::label('title', 'Title') !!}
                                            {!! Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'Title']) !!}
                                        </div>

                                        <div class="form-group">
                                            {!! Form::label('description', 'Description') !!}
                                            {!! Form::text('description', null, ['class'=>'form-control', 'placeholder'=>'Description']) !!}
                                        </div>

                                        <div class="form-group">
                                            {!! Form::label('category', 'Category') !!}
                                            {!! Form::select('category', array(''=>'Select Category') + $categories, [$post->category_id,$post->category->name], ['class'=>'form-control select']) !!}
                                        </div>

                                        <div class="form-group overflow-hidden">
                                            {!! Form::label('tags', 'Tags') !!}
                                            {!! Form::select('tags[]',  $tags, null, ['class'=>'form-control select2', 'multiple']) !!}
                                        </div>

                                        <div class="form-group">
                                            {!! Form::label('published_at', 'Published at') !!}
                                            {!! Form::text('published_at', null, ['class'=>'form-control', 'placeholder'=>'Published at']) !!}
                                        </div>

                                        @if(isset($post->image))

                                            <img src="{{ asset('storage/' . $post->image) }}" alt="" height="50%" width="50%">

                                        @endif

                                        <div class="form-group">
                                            {!! Form::label('image', 'Image') !!}
                                            {!! Form::file('image',['class'=>'form-control']) !!}
                                        </div>

                                        <div class="form-group">
                                            {!! Form::label('content', 'Content') !!}
                                            {!! Form::hidden('content') !!}
                                            <trix-editor input="content"></trix-editor>
                                        </div>

                                        <div class="form-group">
                                            {!! Form::submit('Update Post', ['class'=>'btn btn-success btn-sm']) !!}
                                        </div>

                                        {!! Form::close() !!}



                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>








                @else



                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">



                                <div class="card">
                                    <div class="card-header"><b>Create Post</b></div>
                                    <div class="card-body overflow-auto">

                                        @include('partials.errors')


                                        {!! Form::open(['method'=>'POST', 'action'=>'PostsController@store', 'files'=>true]) !!}

                                        <div class="form-group">
                                            {!! Form::label('title', 'Title') !!}
                                            {!! Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'Title']) !!}
                                        </div>

                                        <div class="form-group">
                                            {!! Form::label('description', 'Description') !!}
                                            {!! Form::text('description', null, ['class'=>'form-control', 'placeholder'=>'Description']) !!}
                                        </div>

                                        <div class="form-group">
                                            {!! Form::label('category', 'Category') !!}
                                            {!! Form::select('category', array(''=>'Select Category') + $categories, null, ['class'=>'form-control ']) !!}
                                        </div>

                                        @if(!empty($tags))
                                            <div class="form-group overflow-hidden">
                                                {!! Form::label('tags', 'Tags') !!}
                                                {!! Form::select('tags[]',  $tags, null, ['class'=>'form-control select2', 'multiple']) !!}
                                            </div>
                                        @endif
                                        <div class="form-group">
                                            {!! Form::label('published_at', 'Published at') !!}
                                            {!! Form::text('published_at', null, ['class'=>'form-control', 'placeholder'=>'Published at']) !!}
                                        </div>

                                        <div class="form-group">
                                            {!! Form::label('image', 'Image') !!}
                                            {!! Form::file('image',['class'=>'form-control']) !!}
                                        </div>

                                        <div class="form-group">
                                            {!! Form::label('content', 'Content') !!}
                                            {!! Form::hidden('content') !!}

                                            <trix-editor input="content"></trix-editor>
                                        </div>

                                        <div class="form-group">
                                            {!! Form::submit('Create Post', ['class'=>'btn btn-primary btn-sm']) !!}
                                        </div>

                                        {!! Form::close() !!}



                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>





                @endif









@endsection

@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

    <script !src="">

        $(document).ready(function() {
            $('.select2').select2();
        });


        flatpickr("#published_at", {
            enableTime: true,
            enableSeconds: true
        });
    </script>
@endsection
