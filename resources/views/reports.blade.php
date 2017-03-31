@extends('centaur.layout')
@section('title', 'Services')
@php
    $bookings = DB::select('SELECT EXTRACT(year from created_at) as year FROM room_user GROUP BY year');
$booking_dates = DB::table('room_user')->get();
        @endphp
@section('content')
    <div class="container">
        <div class="page-header">
            <h1>Reports</h1>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Reports Bookings from </h3>
            </div>
            <div class="panel-body">
                <div id="casesbyyear" style="height: 250px;"></div>
            </div>
        </div>
        <div class="panel panel-primary">
            <div class="panel-body">
                <div id="calendar" style="height: 20px;width:100%;"></div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.min.js"></script>
    <script>
        $(function() {
            new Morris.Line({

                element: 'casesbyyear',

                data: [
                        @foreach($bookings as $booking)
                    { year: "{{ $booking->year }}",value: "{{ \App\Http\Controllers\ReportController::countBookings($booking->year) }}}" },
                    @endforeach
                ],

                xkey: 'year',

                ykeys: ['value'],

                labels: ['Bookings']
            });
        });

        $('#calendar').fullCalendar({

            selectable:true,
            defaultView: 'month',
            displayEventTime:true,
            header: {
                left: 'prev,next today myCustomButton',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            }, agenda: {
                eventLimit: 2
            },
            height: 600,
            themeButtonIcons:{
                prev: 'circle-triangle-w',
                next: 'circle-triangle-e',
                prevYear: 'seek-prev',
                nextYear: 'seek-next'
            },
            theme:true,
            eventLimitClick:'popover',

            contentHeight: 400,
            aspectRatio: 1,
            eventClick: function(calEvent, jsEvent, view) {
                showEvent(calEvent.title,calEvent.start);
            },
            listDayFormat :true,
            allDaySlot:true,
            events: [
                    @foreach($booking_dates as $booking_date)
                {
                    title  : 'Booking from Date '+ "{{ Carbon\Carbon::parse($booking_date->from_date)->format('Y-d-m') }} to date {{ Carbon\Carbon::parse($booking_date->to_date)->format('Y-m-d') }}",

                    start  : moment('{{ $booking_date->from_date }}'),
                    end  : moment('{{ $booking_date->to_date }}'),

                    allday:true,
                    overlap:true,
                },


                @endforeach
            ],
            eventRender: function(event, element) {
                $(element).tooltip({title: event.title});
            },
            weekends: false,
            dayNamesShort:[
                'Sunday','Monday','Tuesday','Wednesday','Thursday', 'Friday', 'Saturday'
            ]

        });
    </script>
@stop