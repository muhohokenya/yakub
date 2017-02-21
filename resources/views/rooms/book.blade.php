@extends('centaur.layout')
@section('title', 'Rooms')
@section('content')
<div class="page-header">
  
  
</div>
<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
	<div class="well">
		<div class="page-header">
		  <h1>Booking Room {{ $room->number }}</h1>
		</div>
		<ul class="list-group">
		Services
		@foreach ($room->services as $room->service)
			
			<li class="list-group-item">
			{{ $room->service->name }} 
				</li>
		@endforeach
		</ul>
	</div>
</div>
<div class="col-xs-4 col-sm-4 col-md-8 col-lg-8">
	@if (Session::has('status'))
		<div class="alert alert-warning">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>{{ Session::get('status') }}</strong>
		</div>
	@endif
	{!! Form::open(['method' => 'POST', 'url' => 'book/room/'.$room->id, 'class' => 'form-horizontal','autocomplete' => 'off']) !!}
	
	    <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
	        {!! Form::label('first_name', 'Full Name') !!}
	        {!! Form::text('first_name', strtoupper(Sentinel::getUser()->first_name), ['class' => 'form-control', 'required' => 'required']) !!}
	        <small class="text-danger">{{ $errors->first('first_name') }}</small>
	    </div>

	    <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
	        {!! Form::label('last_name', 'Last Name') !!}
	        {!! Form::text('last_name', strtoupper(Sentinel::getUser()->last_name), ['class' => 'form-control', 'required' => 'required']) !!}
	        <small class="text-danger">{{ $errors->first('last_name') }}</small>
	    </div>

	    

	    <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
	        {!! Form::label('phone_number', 'Mobile Phone Number') !!}
	        {!! Form::text('phone_number', strtoupper(Sentinel::getUser()->phone_number), ['class' => 'form-control', 'required' => 'required']) !!}
	        <small class="text-danger">{{ $errors->first('phone_number') }}</small>
	    </div>

	    

    	<div class="form-group">
    		<div class='col-md-5'>
    		<label>From date</label>
        <div class="form-group">
            <div class='input-group date' id='datetimepicker6'>
                <input name="from_date" type='text' class="form-control" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
    </div>
    <div class='col-md-5 col-lg-offset-2'>
    <label>To date</label>
        <div class="form-group">
            <div class='input-group date' id='datetimepicker7'>
                <input name="to_date" type='text' class="form-control" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
    </div>
    	</div>

<script type="text/javascript">

$(document).ready(function() {
	$('#datetimepicker6').datetimepicker();
        $('#datetimepicker7').datetimepicker({
            useCurrent: false //Important! See issue #1075
        });
        $("#datetimepicker6").on("dp.change", function (e) {
            $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
        });
        $("#datetimepicker7").on("dp.change", function (e) {
            $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
        });
});
   
</script>





	
	    <div class="btn-group">
	        
	        {!! Form::submit("Reserve", ['class' => 'btn btn-primary']) !!}
	    </div>
	
	{!! Form::close() !!}
</div>

@stop
