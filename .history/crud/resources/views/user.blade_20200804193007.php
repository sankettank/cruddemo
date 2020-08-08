@extends('layouts.app')

@section('content')


<?php
dd($users);



?>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Email</td>
            <td>phone</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($nerds as $key => $value)
        <tr>
            <td>{{ $users->id }}</td>
            <td>{{ $users->name }}</td>
            <td>{{ $users->email }}</td>
            <td>{{ $users->phone }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->

                <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('nerds/' . $value->id) }}">Show this Nerd</a>

                <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('nerds/' . $value->id . '/edit') }}">Edit this Nerd</a>

                <form action="{{ route('nerds.destroy', $value->id) }}" method="POST">
                    @method('delete')
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-small btn-danger" value="Delete the Nerd!">
                   <!--<a class="btn btn-small btn-success" href="{{ URL::to('nerds/' . $value->id) }}">Delete this Nerd</a>-->
                </form>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User List') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
