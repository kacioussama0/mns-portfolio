@extends('layouts.app')

@section('content')
    <div class="container">




        <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="form-group">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title" value="{{old('title')}}">
                @error('title')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control" name="slug" id="slug" value="{{old('slug')}}">
                @error('slug')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="category_id" class="form-label">Categories</label>
                <select name="category_id" id="category_id" class="form-select">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                @error('category_id')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>


            <div class="form-group">
                <label for="thumbnail" class="form-label">Thumbnail</label>
                <input type="file"  class="form-control" name="thumbnail" id="thumbnail" value="{{old('thumbnail')}}">
                @error('thumbnail')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>


            <div class="form-group">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description">{!! old('description') !!}</textarea>
                @error('description')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>




            <div class="form-check form-switch mt-3">
                <input type="checkbox"  class="form-check-input"  name="is_published" id="is_published" value="1">
                <label for="is_published" class="form-check-label">Is Published</label>
            </div>

            @error('is_published')
            <span class="text-danger">{{$message}}</span>
            @enderror

            <button class="btn btn-primary mt-3 w-100">Create</button>

        </form>
    </div>

    <script src="{{asset('assets/js/tinymce/tinymce.min.js')}}"></script>
    <script>
        tinymce.init({
            selector: '#description',
            plugins: 'advlist link image lists code'
        });
    </script>
@endsection
