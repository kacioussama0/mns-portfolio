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
                <label for="society" class="form-label">Society</label>
                <input type="text"   class="form-control" name="society" id="society" value="{{old('society')}}">
                @error('society')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="from" class="form-label">From</label>
                <input type="date"   class="form-control" name="from" id="from" value="{{old('from')}}">
                @error('from')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="to" class="form-label">To</label>
                <input type="date"   class="form-control" name="to" id="to" value="{{old('to')}}">
                @error('to')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <button class="btn btn-primary mt-3 w-100">Create</button>

        </form>
    </div>
@endsection
