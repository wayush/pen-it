@extends('layouts.app')
@section('content')

    <div class="d-flex justify-content-end mb-3 mt-3">
        <a href="{{ route('tags.create') }}" class="btn btn-primary">Add Tag</a>
    </div>

    <div class="card">
        <div class="card-header">
            Tags
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <th>Name</th>
                    <th>Post Count</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach($tags as $tag)
                    <tr>
                        <td>
                            {{$tag->name}}
                        </td>
                        <td>{{$tag->posts->count()}}</td>
                        <td>
                            <a href="{{route('tags.edit', $tag->id)}}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="" class="btn btn-danger btn-sm"
                            onclick="displayModalForm({{$tag}})"
                            data-toggle="modal"
                            data-target="#deleteModal">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    <!---Delete Modal--->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                </div>
            <div class="modal-body">
            <form action="" method="POST" id="deleteForm">
                @csrf
                @method('delete')
                <div class="modal-body">
                    <p>Are you sure you wanna delete?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-danger">
                        Delete Tag
                    </button>
                </div>
            </form>
            </div>
            </div>
    </div>
@endsection

@section('page-level-scripts')
    <script>
        function displayModalForm($tag){
            var url = '/tags/'+$tag.id;
            $("#deleteForm").attr('action', url);
        }
    </script>
@endsection