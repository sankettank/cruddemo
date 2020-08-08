@extends('layouts.app')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">


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

<script src="https://precogsecurity.com/js/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script>

    $(document).ready(function() {


    $('#table1').DataTable({
            pagingType: "full_numbers",
            processing: true,
            serverSide: true,
            ajax: "serverside.php",
            autoWidth: false,
            responsive: true,
            stateSave: true,
            order: [0, "asc"],
            columns: [
                {"ajax": "id"},
                {"ajax": "first_name"},
                {"ajax": "last_name"},
                {"ajax": "email"},
                {"ajax": "phone"},
                {"ajax": "created_at"},
                {"data": null,
                    "name":"Action",
                    "searchable": false,
                    "orderable": false,
                    "width": "4%",
                    "mRender": function (data, type, row) {
                      return "<a href='javascript:void(0)' class='edituser' id = " +row[0] + " ><i class='fa fa-edit'></i>Edit</a>";
                    }
                },
                {"data": null,
                    "searchable": false,
                    "orderable": false,
                    "width": "4%",
                    "mRender": function (data, type, row) {
                        return "<a href='javascript:void(0)' class='deluser' id = " + row[0]  + " ><i class='fa fa-trash'></i>Delete</a>";
                    }
                },
            ],
            ajax: {
                    url: "http://localhost/San-demo/serverside.php", // json datasource
                    type: "get", // method  , by default get
                    data: function (d) {
                        d.usertype = $("input[type='radio'][name='usertype']:checked").val();
                        d.isexpired = $("input[type='radio'][name='isexpired']:checked").val();
                    }
            }
        });
</script>
