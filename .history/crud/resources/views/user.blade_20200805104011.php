@extends('layouts.app')

@section('content')

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Email</td>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $key => $users)
        <tr>
            <td>{{ $users->id }}</td>
            <td>{{ $users->name }}</td>
            <td>{{ $users->email }}</td>

            <!--<td>
                <a class="btn btn-small btn-success" href="{{ URL::to('user/' . $users->id) }}">Show this User</a>
                <a class="btn btn-small btn-info" href="{{ URL::to('user/' . $users->id . '/edit') }}">Edit this User</a>
            </td>-->
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
