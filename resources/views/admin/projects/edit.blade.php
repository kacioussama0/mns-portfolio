@extends('layouts.app')

@section('content')
    <div class="container">




        <form action="{{route('projects.update',$project)}}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{$project->name}}">
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="name" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control">{{$project->description}}</textarea>
                @error('description')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="category_id" class="form-label">Categories</label>
                <select name="category_id" id="category_id" class="form-select">
                    @foreach($categories as $post)
                        <option value="{{$post->id}}">{{$post->name}}</option>
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

            <img src="{{asset('storage/'. $project->thumbnail)}}" alt="{{$project->name}}" style="width: 200px">

            <button class="btn btn-primary mt-3 w-100">Edit</button>

        </form>
    </div>
@endsection
