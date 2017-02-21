@extends('Centaur::layout')

@section('title', 'Dashboard')

@section('content')
@php $current =  new Carbon\carbon() @endphp
<div class="row" style="padding-top: 50px;">
    @if (Sentinel::check() && Sentinel::inRole('administrator'))
    <div class="">
    <div class="page-header">
      <h1>Booked Rooms <small class="badge">{{ count($bookings) }}</small></h1>
    </div>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Client</th>
                    <th>Room</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Charges Per Day</th>
                    <th>Days</th>
                    <th>Total Charges</th>
                    
                </tr>
            </thead>
            <tbody>
            @php
                $carbon = new Carbon\Carbon();
            @endphp
                @foreach ($bookings as $booking)
                    <tr>
                    {{-- {{ $booking->from_date }} --}}

                    <br>
                    
                    {{-- DATES --}}
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
                    
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ App\User::find($booking->user_id)->email }}</td>
                    <td>{{ App\Room::find($booking->room_id)->number }}</td>
                    <td>{{ $booking->from_date }}</td>
                    <td>{{ $booking->to_date }}</td>
                    <td>{{ App\Room::find($booking->room_id)->charges }}</td>
                    @php
                        $from_day = Carbon\Carbon::createFromDate($year, $month, $day,0);
                        $to_day = Carbon\Carbon::createFromDate($to_year, $to_month, $to_day,0);
                    @endphp
                    
                    <td class="hidden-xs">{{ $to_day->diffInDays($from_day) }} <small>days</small></td>
                    <td>{{ ($to_day->diffInDays($from_day) * App\Room::find($booking->room_id)->charges) }}</td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
        <div class="">
            
            <p><a class="btn btn-primary" href="{{ route('auth.login.form') }}" role="button">Sign In</a></p>
        </div>
    @endif

    <?php
        $user = Sentinel::findById(1);

        // var_dump(Activation::create($user));
    ?>
</div>
@stop