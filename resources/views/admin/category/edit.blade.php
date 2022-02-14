@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4> Add Category</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('update-category') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <input type="hidden" name="id" value="{{ $category->id }}">
                        <label>Name {{ $category->name }}</label>
                        <input type="text" class="form-control" placeholder="no" name="name"
                               value="{{ $category->name }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Slug</label>
                        <input type="text" class="form-control" name="slug" value="{{ $category->slug }}">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label>Description</label>
                        <textarea type="text" class="form-control" name="description"
                                  rows="3">{{$category->description}}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Status</label>
                        <input type="checkbox" class="form-control" name="status"
                            {{ $category->status == '1'? 'checked': 'off'}}>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Popular</label>
                        <input type="checkbox" class="form-control" name="popular"
                        {{ $category->popular == '1'? 'checked': 'off'}}">
                    </div>
                    <div class=" col-md-12 mb-3">
                        <label>Meta Title</label>
                        <input type="text" class="form-control" name="meta_title"
                               value="{{ $category->meta_title}}">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label>Meta Keywords</label>
                        <textarea type="text" class="form-control" name="meta_keywords"
                                  rows="3">{{$category->meta_keywords}}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label>Meta Description</label>
                        <textarea type="text" class="form-control" name="meta_descrip"
                                  rows="3">{{$category->meta_descrip}}</textarea>
                    </div>
                    <div class="col-md-12">
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ url('/list-categories') }}">
                            <button type="button" class="btn btn-secondary">Cancel</button>
                        </a>

                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
