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
        @foreach($nerds as $key => $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->email }}</td>
                <td>{{ $value->phone }}</td>

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
@endsection

