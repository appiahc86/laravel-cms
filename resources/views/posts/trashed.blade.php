@extends('layouts.app')

@section('content')

 <div class="card">
     <div class="card-header text-danger"><b>Trashed Posts</b></div>
     <div class="card-body">

         @if(count($posts) > 0)

         <div class="table-responsive">
             <table class="table table-sm">
                 <thead>
                 <tr>
                     <th>Image</th>
                     <th>Title</th>
                     <th>Deleted</th>
                     <th></th>
                     <th></th>
                 </tr>
                 </thead>

                 <tbody>

                 @foreach($posts as $post)

                     <tr>
                         <td><img height="50" width="64" src="{{ asset('storage/'.$post->image) }}" alt=""></td>
                         <td>{{ $post->title }}</td>
                         <td>{{ $post->deleted_at->diffForHumans() }}</td>

                         <td>
                             {!! Form::open(['method'=>'PUT', 'action'=>['PostsController@restore', $post->id]]) !!}
                             {!! Form::submit('Restore',['class'=>'btn btn-info btn-sm']) !!}
                             {!! Form::close() !!}
                         </td>

                         <td>
                             {!! Form::open(['method'=>'DELETE', 'action'=>['PostsController@destroy', $post->id]]) !!}
                             {!! Form::submit('Delete',['class'=>'btn btn-danger btn-sm']) !!}
                             {!! Form::close() !!}
                         </td>
                     </tr>

                 @endforeach
                 </tbody>

             </table>
         </div>

             @else
             <h3 class="text-center">Trash is empty</h3>

             @endif
     </div>
 </div>



@endsection
