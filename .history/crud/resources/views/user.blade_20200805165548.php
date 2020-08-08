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


<div class="modal fade" id="ajaxModel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h4 class="modal-title" id="modelHeading"></h4>

            </div>

            <div class="modal-body">

                <form id="productForm" name="productForm" class="form-horizontal">

                   <input type="hidden" name="product_id" id="product_id">

                    <div class="form-group">

                        <label for="name" class="col-sm-2 control-label">Name</label>

                        <div class="col-sm-12">

                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="" maxlength="50" required="">

                        </div>

                    </div>



                    <div class="form-group">

                        <label class="col-sm-2 control-label">Details</label>

                        <div class="col-sm-12">

                            <textarea id="detail" name="detail" required="" placeholder="Enter Details" class="form-control"></textarea>

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


     $('body').on('click', '.edituser', function () {

        var product_id = $(this).attr('id');

        $.get("{{ route('ajaxproducts.index') }}" +'/' + product_id +'/edit', function (data) {

            $('#modelHeading').html("Edit Product");

            $('#saveBtn').val("edit-user");

            $('#ajaxModel').modal('show');

            $('#product_id').val(data.id);

            $('#name').val(data.name);

            $('#detail').val(data.detail);

        })

    });






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
