@extends('layouts.app')

@section('content')
    <div class="container">




        <form action="{{route('services.update',$service)}}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title" value="{{$service->title}}">
                @error('title')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control">{{$service->description}}</textarea>
                @error('description')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <img src="{{asset('storage/' . $service->thumbnail)}}" alt="" class="my-3" style="width: 80px;height: 80px">

            <div class="form-group">
                <label for="thumbnail" class="form-label">Thumbnail</label>
                <input type="file"  class="form-control" name="thumbnail" id="thumbnail" value="{{old('thumbnail')}}">
                @error('thumbnail')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <button class="btn btn-primary mt-3 w-100">Edit</button>

        </form>
    </div>
@endsection
