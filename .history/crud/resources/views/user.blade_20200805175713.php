@extends('layouts.app')

@section('content')

<div class="container">
    <a class="btn btn-success" href="javascript:void(0)" id="createNewProduct"> Create New Product</a>
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


<div class="modal fade" id="ajaxModel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h4 class="modal-title" id="modelHeading"></h4>

            </div>

            <div class="modal-body">

                <form id="userForm" name="userForm" class="form-horizontal">

                   <input type="hidden" name="user_id" id="user_id">

                    <div class="form-group">

                        <label for="name" class="col-sm-2 control-label">Name</label>

                        <div class="col-sm-12">

                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="" maxlength="50" required="">

                        </div>

                    </div>



                    <div class="form-group">

                        <label class="col-sm-2 control-label">Email</label>

                        <div class="col-sm-12">

                            <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email" value="" maxlength="50" required="">

                        </div>

                    </div>



                    <div class="col-sm-offset-2 col-sm-10">

                     <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes

                     </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

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

        var table1 = $('.data-table').DataTable({
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

    $('#createNewProduct').click(function () {
        $('#saveBtn').val("create-product");
        $('#user_id').val('');
        $('#userForm').trigger("reset");
        $('#modelHeading').html("Create New Product");
        $('#ajaxModel').modal('show');
    });

    /* Edit Data */
    $('body').on('click', '.edituser', function () {
        var user_id = $(this).attr('id');
        $.get("{{ route('user') }}" +'/' + user_id +'/edit', function (data) {
            $('#modelHeading').html("Edit Product");
            $('#saveBtn').val("edit-user");
            $('#ajaxModel').modal('show');
            $('#user_id').val(data.id);
            $('#name').val(data.name);
            $('#email').val(data.email);
        })
    });

    /* Update Data */
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $.ajax({

            data: $('#userForm').serialize(),
            url: "{{ route('user') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#userForm').trigger("reset");
                $('#ajaxModel').modal('hide');
                //table.draw();
                $('.data-table').DataTable().ajax.reload();
            },

            error: function (data) {
                console.log('Error:', data);
                $('#saveBtn').html('Save Changes');
            }
        });

    });


    /* Delete Data */
     $('body').on('click', '.deluser', function () {

        var user_id = $(this).attr("id");

        confirm("Are You sure want to delete !");

        $.ajax({
            type: "DELETE",
            url: "{{ route('user') }}"+'/'+user_id,
            success: function (data) {
                //table1.draw();
                $('.data-table').DataTable().ajax.reload();
            },
            error: function (data) {
                console.log('Error:', data);
            }

    });

});

</script>

@endsection
