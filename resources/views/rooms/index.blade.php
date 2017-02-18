@extends('centaur.layout')
@section('title', 'Rooms')
@section('content')
	<div class="page-header">
	  <h3>Rooms <small><a href="{{ url('rooms/new') }}">Add new Room</a></small></h3>
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
						<th>Room Number</th>
						<th>Room Charges</th>
					</tr>
				</thead>
				<tbody>

			@foreach($rooms as $room)
				     <tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $room->number }}</td>
						<td>{{ $room->charges }}</td>
					</tr>
			@endforeach
					
				</tbody>
			</table>
		</div>
	</div>
@stop
