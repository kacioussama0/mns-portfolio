@extends('layouts.app')

@section('content')


    <div class="container">
        <h1>Categories</h1>

        <a href="{{route('categories.create')}}" class="btn btn-primary">Add Category</a>

        @if(Session::has('success'))
            <div class="alert alert-success my-3">{{ Session::get('success') }}</div>
        @endif

        <div class="table-responsive my-3">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Type</th>
                        <th>Published</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $post)
                        <tr>
                            <td>{{$post->name}}</td>
                            <td>{{$post->slug}}</td>
                            <td>{{$post->type}}</td>
                            <td>{{$post->is_published ? "Yes" : "No" }}</td>
                            <td>{{$post->created_at}}</td>
                            <td>{{$post->updated_at}}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Actions
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{route('categories.edit',$post)}}">Edit</a></li>
                                        <li>
                                                <form action="{{route('categories.destroy',$post)}}" method="POST" onsubmit="return confirm('are you sure ?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="dropdown-item">Delete</button>
                                                </form>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
