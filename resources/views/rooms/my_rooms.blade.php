@extends('centaur.layout')
@section('title', 'My Rooms')
@section('content')
<div class="page-header">
  <h1>My Rooms</h1>
</div>


<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
@if (Session::has('status'))
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>Success!</strong> {{ Session::get('status') }}
		</div>
	@endif
	<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Panel title</h3>
	</div>
	
	<div class="panel-body">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Room</th>
					<th>From Date</th>
					<th>To Date</th>
					<th>Booking Date</th>
					<th>Action</th>
					
				</tr>
			</thead>
			<tbody>
			@foreach ($bookings as $booking)
			{{-- {{ $booking }} --}}
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td>Room {{ $booking->room_id }}</td>
					<td>{{ $booking->from_date }}</td>
					<td>{{ $booking->to_date }}</td>
					<td>{{ $booking->created_at }}</td>
					<td><a href="{{ url('/bookings/delete',array($booking->id)) }}" class="text-danger">Drop</a></td>
				</tr>
			@endforeach
				
			</tbody>
		</table>
		
		
	</div>
</div>
</div>
<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
	
		<img src="{{ url('img/mpesa.png') }}">
</div>
@stop