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
        <td>{$users->id}</td>
    </tbody>

</table>
@endsection

