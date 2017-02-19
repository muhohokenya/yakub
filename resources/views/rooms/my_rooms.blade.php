@extends('centaur.layout')
@section('title', 'My Rooms')
@section('content')
<div class="page-header">
  <h1>My Rooms</h1>
</div>


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
				</tr>
			@endforeach
				
			</tbody>
		</table>
	</div>
</div>
@stop