@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table" bgcolor="white">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    <th scope="col">Popular</th>
                    <th scope="col">Meta title</th>
                    <th scope="col">Meta Description</th>
                    <th scope="col">Meta Keywords</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <th scope="row">{{ $category->id }}</th>
                        <td>{{$category->name}}</td>
                        <td>{{$category->slug}}</td>
                        <td>{{$category->description}}</td>
                        <td><img src="{{ asset('assets/uploads/category/'. $category->image)}}" class="category-image" alt="Category Image">
                        </td>
                        <td>{{$category->status}}</td>
                        <td>{{$category->popular}}</td>
                        <td>{{$category->meta_title}}</td>
                        <td>{{$category->meta_descrip}}</td>
                        <td>{{$category->meta_keywords}}</td>
                        <td><a href="" data-toggle="modal" data-target="#deleteModal-{{ $category->id }}"><i
                                    class="fa-solid fa-trash-can"></i></a>
                            <a href="/edit/{{$category->id}}"><i class="fa fa-edit"></i></a></td>
                    </tr>

                    <!-- Modal -->
                    <div class="modal fade" id="deleteModal-{{ $category->id }}" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Category?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p class="lead">
                                        <i class="fa fa-question-circle fa-lg"></i>
                                        Are you sure to delete <strong> {{ $category->name }}</strong>?
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a href="{{url('/delete/'.$category->id)}}">
                                        <button type="button" class="btn btn-primary">Delete</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
