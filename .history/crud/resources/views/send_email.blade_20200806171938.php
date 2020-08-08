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

{{ Form::open(array('method'=>'POST','action' => "MailController@send")) }}

    {{ csrf_field() }}

    <div class="form-group">
        {{ Form::label('name', 'Name', array('class' => 'col-sm-2 control-label')) }}
        {{ Form::text('name', old('name'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Enter Email', array('class' => 'col-sm-2 control-label')) }}
        {{ Form::text('email', old('email'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('detail', 'Detail', array('class' => 'col-sm-2 control-label')) }}
        {{ Form::textarea('detail', old('detail'), array('class' => 'form-control')) }}
    </div>

    <div class="col-sm-offset-2 col-sm-10">
    {{ Form::submit('Create the Nerd!', array('class' => 'btn btn-primary')) }}
    </div>

    <div class="col-sm-offset-2 col-sm-10">
     <button type="submit" class="btn btn-primary" id="saveBtn" value="send">Send
     </button>
    </div>


    {{ Form::close() }}
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
