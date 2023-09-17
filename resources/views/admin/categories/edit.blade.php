@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Category</h1>

        <form action="{{route('categories.update',$category)}}" method="POST">

            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{$category->name}}">
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control" name="slug" id="slug" value="{{$category->slug}}">
                @error('slug')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="type" class="form-label">Type</label>
                <select name="type" id="type" class="form-select">
                    <option value="posts" @if($category->type == 'posts') selected @endif>Posts</option>
                    <option value="projects" @if($category->type == 'projects') selected @endif>Projects</option>
                </select>
                @error('type')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-check form-switch mt-3">
                <input type="checkbox"  class="form-check-input"  @if($category->is_published) checked @endif name="is_published" id="is_published" value="1">
                <label for="is_published" class="form-check-label">Is Published</label>
            </div>

            @error('is_published')
            <span class="text-danger">{{$message}}</span>
            @enderror

            <button class="btn btn-primary mt-3 w-100">Edit</button>

        </form>
    </div>
@endsection
