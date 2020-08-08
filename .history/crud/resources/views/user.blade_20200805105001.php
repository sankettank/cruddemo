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

</table>
@endsection

<script src="https://precogsecurity.com/js/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script>

    $(document).ready(function() {
        $('#table1').DataTable({
            processing: true,
            serverSide: true,
            ajax: "serverside.php",
        });
    });
</script>
