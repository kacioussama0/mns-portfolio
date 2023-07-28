@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Experience</h1>

        <a href="{{route('experience.create')}}" class="btn btn-primary">Add Experience</a>

        @if(Session::has('success'))
            <div class="alert alert-success my-3">{{ Session::get('success') }}</div>
        @endif

        <div class="table-responsive my-3">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>title</th>
                    <th>description</th>
                    <th>society</th>
                    <th>from</th>
                    <th>to</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($experiences as $experience)
                    <tr>
                        <td>{{$experience->title}}</td>
                        <td>{{$experience->description}}</td>
                        <td>{{$experience->society}}</td>
                        <td>{{$experience->from}}</td>
                        <td>{{$experience->to}}</td>

                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                    Actions
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{route('experience.edit',$experience)}}">Edit</a>
                                    </li>
                                    <li>
                                        <form action="{{route('experience.destroy',$experience)}}" method="POST"
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
