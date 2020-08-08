@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Laravel Datatables</h1>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
@endsection

@section('script')
<script type="text/javascript">
    $( document ).ready(function() {
        $.noConflict();
        var table = $('.data-table').DataTable({
           pagingType: "full_numbers",
           processing: true,
           serverSide: true,
           ajax: "{{ route('user') }}",
           autoWidth: false,
           responsive: true,
           stateSave: true,
           order: [0, "asc"],
           columns: [
               {data: 'id', name: 'id'},
               {data: 'name', name: 'name'},
               {data: 'email', name: 'email'},
               {"data": null,
                    "name":"Action",
                    "searchable": false,
                    "orderable": false,
                    "width": "4%",
                    "render": function (o) {
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
           ]
        });

     });
</script>
@endsection
