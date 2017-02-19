@extends('centaur.layout')
@section('title', 'Rooms')
@section('content')
	@foreach ($rooms  as $room)
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
			<div class="well">
				<div class="page-header">
				
				  <h3>Room {{ $room->number }}</h3>
				</div>
				
				charges per night <kbd>{{ $room->charges }}</kbd>

				<a class="btn btn-link" role="button" data-toggle="collapse" href="#collapseExample{{ $room->id }}" aria-expanded="false" aria-controls="collapseExample">
  <div class="badge">{{ count($room->services) }}</div>  Services 
</a>

<div class="collapse" id="collapseExample{{ $room->id }}">
  <div class="well">
    <div class="checkbox text-primary">
				 @foreach ($room->services as $room->service)
					
					<label>
						<input type="checkbox" checked disabled= value="">
						{{ $room->service->name }}
					</label>
				@endforeach
					
				</div>
  </div>
</div>
				

			</div>
		</div>
	@endforeach
@stop
