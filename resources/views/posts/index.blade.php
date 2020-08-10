@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-end mb-2">
    <a href="{{ route('posts.create') }}" class="btn btn-sm btn-success">Create Post</a>
</div>

@if(count($posts) > 0)

<div class="card">
    <div class="card-header"><b>Posts</b></div>

    <div class="card-body">

        <div class="table-responsive">
        <table class="table table-sm">
            <thead>
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Category</th>
                <th>Created</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            </thead>


            <tbody>

            @foreach($posts as $post)

                <tr>
                    <td><img height="64" width="64" style="border-radius: 50%;" src="{{ asset('storage/'.$post->image) }}" alt=""></td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->category ? $post->category->name : 'No category' }}</td>
                    <td>{{ $post->created_at->diffForHumans() }}</td>
                    <td> <a href="{{ route('blog.show', $post->id) }}" class="btn btn-success btn-sm">View</a></td>
                    <td><a href="{{ route('posts.edit', $post->id) }}"> <button class="btn btn-info btn-sm">Edit</button></a></td>
                    <td>
                        {!! Form::open(['method'=>'DELETE', 'action'=>['PostsController@destroy', $post->id]]) !!}
                        {!! Form::submit('Trash',['class'=>'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>

            @endforeach
            </tbody>

        </table>
    </div>



    </div>

    <div class="card-footer">
        <div class="offset-5">{{ $posts->render() }}</div>
    </div>

</div>

    @else

    <h3 class="text-center">No Posts Found</h3>

    @endif

@endsection
