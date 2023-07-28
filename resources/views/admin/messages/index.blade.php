@extends('layouts.app')

@section('content')


    <div class="container">

        <h1>Messages</h1>

        @if(Session::has('success'))
            <div class="alert alert-success my-3">{{ Session::get('success') }}</div>
        @endif

        <div class="table-responsive my-3">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>first name</th>
                        <th>last name</th>
                        <th>subject</th>
                        <th>message</th>
                        <th>created at</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($messages as $message)
                        <tr>
                            <td>{{$message->first_name}}</td>
                            <td>{{$message->last_name}}</td>
                            <td>{{$message->subject}}</td>
                            <td>{{$message->message}}</td>
                            <td>{{$message->created_at}}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Actions
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                                <form action="{{url('admin/messages/' . $message->id)}}" method="POST" onsubmit="return confirm('are you sure ?')">
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
