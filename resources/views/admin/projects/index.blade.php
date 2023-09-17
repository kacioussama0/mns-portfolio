@extends('layouts.app')

@section('content')


    <div class="container">
        <h1>Services</h1>

        <a href="{{route('projects.create')}}" class="btn btn-primary">Add Project</a>

        @if(Session::has('success'))
            <div class="alert alert-success my-3">{{ Session::get('success') }}</div>
        @endif

        <div class="table-responsive my-3">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>thumbnail</th>
                        <th>created at</th>
                        <th>updated at</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $project)
                        <tr>
                            <td>{{$project->name}}</td>
                            <td>
                                <img src="{{asset('storage/' . $project->thumbnail)}}" alt="{{$project->name}}" style="width: 80px">
                            </td>
                            <td>{{$project->created_at}}</td>
                            <td>{{$project->updated_at}}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Actions
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{route('projects.edit',$project)}}">Edit</a></li>
                                        <li>
                                                <form action="{{route('projects.destroy',$project)}}" method="POST" onsubmit="return confirm('are you sure ?')">
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
