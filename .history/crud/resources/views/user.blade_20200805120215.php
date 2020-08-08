@extends('layouts.app')

@section('content')

<table class="table table-striped table-bordered" id="table1">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Email</td>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $key => $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>

                <!-- we will also add show, edit, and delete buttons -->

            </tr>
        @endforeach
        </tbody>

</table>
@endsection

