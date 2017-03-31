<?php

namespace App\Http\Controllers;

use App\Room;
use DB;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    //

    public function index(){
        return view('reports');
    }

    public static function countBookings($year){
        $bookings = DB::table('room_user')->whereYear('created_at',$year)->get();
        return count($bookings);
    }
}
