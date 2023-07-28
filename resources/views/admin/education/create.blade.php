@extends('layouts.app')

@section('content')
    <div class="container">




        <form action="{{route('experience.store')}}" method="POST">

            @csrf

            <div class="form-group">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title" value="{{old('title')}}">
                @error('title')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control">{{old('description')}}</textarea>
                @error('description')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="education_year" class="form-label">Year Of Education</label>
                <input type="number" min="1900" max="2099" step="1"  class="form-control" name="education_year" id="education_year" value="{{old('education_year')}}">
                @error('education_year')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <button class="btn btn-primary mt-3 w-100">Create</button>

        </form>
    </div>
@endsection
