@extends('centaur.layout')
@section('title', 'Rooms')
@section('content')
	<div class="page-header">
	  <h3>Rooms <small><a href="{{ url('rooms/new') }}">Add new Room</a></small></h3>
	</div>

	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Room Panel</h3>
		</div>
		<div class="panel-body">
			<table class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Room Number</th>
						<th>Charges</th>
						<th>Room Services</th>
					</tr>
				</thead>
				<tbody>

			@foreach($rooms as $room)
				     <tr>
						<td>{{ $loop->iteration }}</td>
						<td>Room {{ $room->number }}</td>
						<td>{{ $room->charges }}</td>
						<td>

						   <div class="checkbox">
							@foreach($room->services as $service)
							 <label>
								<input name="services[]"  checked="" readonly="" type="checkbox" value="{{ $service->id }}">
								{{ $service->name }}
							</label>
							@endforeach
						</div>
						</td>
					</tr>
			@endforeach
					
				</tbody>
			</table>

		</div>
	</div>
	{{ $rooms }}
@stop
