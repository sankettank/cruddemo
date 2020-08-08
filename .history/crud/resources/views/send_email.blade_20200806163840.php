@extends('layouts.app')

@section('content')

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
@endsection
@section('script')
<script type="text/javascript">
    $( document ).ready(function() {
        $.noConflict();

        $(".nav-item").click(function(){
            $(".navbar-expand-md .navbar-nav .dropdown-menu").toggle();
        });
    });
</script>
@endsection
