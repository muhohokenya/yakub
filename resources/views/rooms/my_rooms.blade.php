@extends('centaur.layout')
@section('title', 'My Rooms')
@section('content')
@php $current =  new Carbon\carbon() @endphp
<div class="page-header">
  <h1>My Rooms</h1>
</div>


<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
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
					
					
					<th>from</th>
					<th>To</th>
					<th>Span</th>
					<th>Ksh/= per Day</th>
					<th>Ksh/= Totals</th>
					<th>Drop</th>
					
				</tr>
			</thead>
			<tbody>
			@php
				$total = [];
			@endphp
			@foreach ($bookings as $booking)
			{{-- {{ $booking }} --}}
			
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td>{{ $booking->room_id }}</td>
					
					<td>{{ $booking->created_at }}</td>
					
					 @php $carbon = Carbon\Carbon::now(new DateTimeZone('Africa/Nairobi'));@endphp
                        @php    $year = trim(substr($booking->from_date,0,4)); @endphp
                        
                        @php    $month = trim(substr($booking->from_date,5,-12)); @endphp
                        
                        @php    $day = trim(substr($booking->from_date, 8,-9));    @endphp  
                        
                        {{-- to when --}}
                            
                        @php   $to_year = substr($booking->to_date,0,4); @endphp
                        @php    $to_month = substr($booking->to_date,5,-12); @endphp
                        @php    $to_day = substr($booking->to_date, 8,-9);    @endphp  
                        @php    $currentDate = Carbon\Carbon::createFromDate($current->year, $current->month, $current->day,0);@endphp
                        {{-- to when --}}
                    {{-- DATES --}}
                    @php
                        $from_day = Carbon\Carbon::createFromDate($year, $month, $day,0);
                        $to_day = Carbon\Carbon::createFromDate($to_year, $to_month, $to_day,0);
                    @endphp
                    
                    
                    <td>{{ $booking->to_date }}</td>
                    <td class="hidden-xs">{{ $to_day->diffInDays($from_day) }} <small>days</small></td>
                    <td>{{ App\Room::find($booking->room_id)->charges }}</td>
                    @php
                    	$total[] = ($to_day->diffInDays($from_day) * App\Room::find($booking->room_id)->charges);
                    @endphp
                    
                    
                    <td>{{ ($to_day->diffInDays($from_day) * App\Room::find($booking->room_id)->charges) }}</td>
                    <td><a href="{{ url('/bookings/delete',array($booking->id)) }}" class="text-danger">Drop</a></td>
				</tr>
			@endforeach
			
				
			</tbody>
		</table>
		
		
	</div>
</div>
</div>
<div class="col-xs-4 col-sm-2 col-md-2 col-lg-2">
	<code>please Pay {{ array_sum($total) }} To</code>
		<img src="{{ url('img/mpesa.png') }}">
</div>
@stop