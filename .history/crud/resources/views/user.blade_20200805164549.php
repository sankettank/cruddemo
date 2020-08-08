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

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


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
                    return "<a href='javascript:void(0)' class='edituser' id = " +o.id  + " ><i class='fa fa-edit'></i>Edit</a>";
                }
                },
                {"data": null,
                    "searchable": false,
                    "orderable": false,
                    "width": "4%",
                    "render": function (o) {
                    return "<a href='javascript:void(0)' class='deluser' id = " + o.id  + " ><i class='fa fa-trash'></i>Delete</a>";
                }
            },
           ]
        });

     });

     $('body').on('click', '.deluser', function () {

        var user_id = $(this).attr("id");

        confirm("Are You sure want to delete !");

        $.ajax({

            type: "DELETE",

            url: "{{ route('user') }}"+'/'+user_id,


            success: function (data) {

                table.draw();
            },

            error: function (data) {

                console.log('Error:', data);

            }

    });

});


</script>





@endsection
