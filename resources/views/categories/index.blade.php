@extends('layouts.app')

@section('content')


    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('categories.create') }}" class="btn btn-success btn-sm">Add Category</a>
    </div>

<div class="card">
    <div class="card-header"><b>Categories</b></div>
    <div class="card-body">

        @if(count($categories) > 0)



        <table class="table table-sm">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Post Count</th>
                <th>Created</th>
                <th></th>
                <th></th>
            </tr>
            </thead>

            <tbody>

                 @foreach($categories as $category)

                     <tr>
                         <td>{{ $category->id }}</td>
                         <td>{{ $category->name }}</td>
                         <td>{{ $category->posts->count() }}</td>
                         <td>{{ $category->created_at ? $category->created_at->diffForHumans() : 'no date found'}}</td>
                         <td><a class="btn btn-sm btn-info mb-1" href="{{ route('categories.edit', $category->id) }}">Edit</a> </td>
                         <td> <button onclick="handelDelete({{ $category->id }});" class="btn btn-sm btn-danger mb-1">Delete</button></td>

                     </tr>




                 @endforeach

            </tbody>

        </table>

            @else
            <h3>No Category Found</h3>
            @endif

    </div>
</div>


        <div class="offset-5 my-2">{{ $categories->render() }}</div>




    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <form method="POST" action="" id="delete_form">
                @csrf
                @method('DELETE')

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="exampleModalLabel"><b>Delete Category</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   <p class="text-center"><b> Are you sure you want to delete this category?</b></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </div>
            </div>


            </form>


        </div>
    </div>


@endsection

@section('scripts')

    <script>

       function handelDelete(id) {



           var form = document.getElementById('delete_form');
         form.action = '/categories/' + id;


           $('#deleteModal').modal().show();
       }

    </script>
@endsection
