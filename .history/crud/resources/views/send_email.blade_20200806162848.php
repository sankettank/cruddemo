<!DOCTYPE html>
<html>
<head>
    <title>Laravel 5.8 Ajax CRUD tutorial using Datatable </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
</head>
<body>

<div class="container box">

    @if(count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $item)
                <li>{{ $item }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if($message = Session::get('success'))
    <div class="alert alert-success" role="alert">
    <strong>{{ $message }}</strong>
    </div>
    @endif
<form method="post" action="{{ url('email/send')}}">

    {{ csrf_field() }}

    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">Enter name</label>
        <div class="col-sm-12">
            <input type="text" class="form-control" name="name" placeholder="Enter Name" value="" maxlength="50" required="">
        </div>
    </div>

    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">Enter Email</label>
        <div class="col-sm-12">
            <input type="text" class="form-control" name="email" placeholder="Enter Email" value="" maxlength="50" required="">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Details</label>
        <div class="col-sm-12">
            <textarea id="detail" name="detail" required="" placeholder="Enter Details" class="form-control"></textarea>
        </div>
    </div>

    <div class="col-sm-offset-2 col-sm-10">
     <button type="submit" class="btn btn-primary" id="saveBtn" value="send">Send
     </button>
    </div>


    </form>
</div>
