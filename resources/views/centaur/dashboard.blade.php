@extends('Centaur::layout')

@section('title', 'Dashboard')

@section('content')
<div class="row" style="padding-top: 50px;">
    @if (Sentinel::check() && Sentinel::inRole('administrator'))
    <div class="">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $booking)
                    <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $booking->id }}</td>
                    <td>{{ $booking->user }}</td>
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