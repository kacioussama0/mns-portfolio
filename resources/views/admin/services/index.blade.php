@extends('layouts.app')

@section('content')


    <div class="container">
        <h1>Services</h1>

        <a href="{{route('services.create')}}" class="btn btn-primary">Add Service</a>

        @if(Session::has('success'))
            <div class="alert alert-success my-3">{{ Session::get('success') }}</div>
        @endif

        <div class="table-responsive my-3">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>thumbnail</th>
                        <th>description</th>
                        <th>created at</th>
                        <th>updated at</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($services as $service)
                        <tr>
                            <td>{{$service->title}}</td>
                            <td>
                                <img src="{{asset('storage/' . $service->thumbnail)}}" alt="{{$service->title}}" style="width: 80px">
                            </td>
                            <td>{{$service->description}}</td>
                            <td>{{$service->created_at}}</td>
                            <td>{{$service->updated_at}}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Actions
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{route('services.edit',$service)}}">Edit</a></li>
                                        <li>
                                                <form action="{{route('services.destroy',$service)}}" method="POST" onsubmit="return confirm('are you sure ?')">
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
