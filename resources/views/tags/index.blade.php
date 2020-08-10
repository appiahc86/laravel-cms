@extends('layouts.app')

@section('content')


    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('tags.create') }}" class="btn btn-success btn-sm">Add Tag</a>
    </div>

    <div class="card">
        <div class="card-header"><b>Tags</b></div>
        <div class="card-body">

            @if(count($tags) > 0)



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

                    @foreach($tags as $tag)

                        <tr>
                            <td>{{ $tag->id }}</td>
                            <td>{{ $tag->name }}</td>
                            <td>{{ $tag->posts->count() }}</td>
                            <td>{{ $tag->created_at ? $tag->created_at->diffForHumans() : 'no date found'}}</td>
                            <td><a class="btn btn-sm btn-info mb-1" href="{{ route('tags.edit', $tag->id) }}">Edit</a></td>
                            <td><button onclick="handelDelete({{ $tag->id }});" class="btn btn-sm btn-danger mb-1">Delete</button></td>

                        </tr>





                    @endforeach

                    </tbody>

                </table>

            @else
                <h3>No Tag Found</h3>
            @endif

        </div>
    </div>


    <div class="offset-5 my-2">{{ $tags->render() }}</div>




    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <form method="POST" action="" id="delete_form">
                @csrf
                @method('DELETE')

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-danger" id="exampleModalLabel"><b>Delete Tag</b></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-center"><b> Are you sure you want to delete this Tag?</b></p>
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
            form.action = '/tags/' + id;


            $('#deleteModal').modal().show();
        }

    </script>
@endsection
