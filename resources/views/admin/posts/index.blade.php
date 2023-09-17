@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Posts</h1>

        <a href="{{route('posts.create')}}" class="btn btn-primary">Add Post</a>

        @if(Session::has('success'))
            <div class="alert alert-success my-3">{{ Session::get('success') }}</div>
        @endif

        <div class="table-responsive my-3">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Thumbnail</th>
                    <th>category</th>
                    <th>Published</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{$post->title}}</td>
                        <td>{{$post->category->name}}</td>
                        <td><img src="{{asset('storage/' . $post->thumbnail)}}" alt="{{$post->name}}" style="width: 50px"></td>
                        <td>{{$post->is_published ? "Yes" : "No" }}</td>
                        <td>{{$post->created_at}}</td>
                        <td>{{$post->updated_at}}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                    Actions
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{route('posts.edit',$post)}}">Edit</a></li>
                                    <li>
                                        <form action="{{route('posts.destroy',$post)}}" method="POST"
                                              onsubmit="return confirm('are you sure ?')">
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
