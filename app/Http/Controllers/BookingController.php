<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use App\Booking;
use Carbon\Carbon;
use Sentinel;
use Illuminate\Support\Facades\DB;
class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function showMyBookings()
    {
        $user_id = Sentinel::getUser()->id;

        $bookings = Booking::where('user_id',$user_id)->get();
        return view('rooms.my_rooms')->with('bookings',$bookings);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $room = Room::findOrFail($id);
       return view('rooms.book')->with('room',$room);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //


        $room = Room::findOrFail($id);
        $user = Sentinel::getUser();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone_number = $request->phone_number;
        
        $from_date = str_replace("/", "-", trim(substr($request->from_date,0,-8)));
        $month = trim(substr($from_date,0,-8));
        $day = trim(substr($from_date,3,-5));
        $year = trim(substr($from_date,6));

        $to_date = str_replace("/", "-", trim(substr($request->to_date,0,-8)));
        $to_month = trim(substr($to_date,0,-8));
        $to_day = trim(substr($to_date,3,-5));
        $to_year = trim(substr($to_date,6));

        $tz = 'Africa/Nairobi';

        
       $from_date =  Carbon::createFromDate($year, $month, $day, $tz);
       $to_date =  Carbon::createFromDate($to_year, $to_month, $to_day, $tz);
       
       $user->save();

      if($this->hasBooked($user->id,$room->id)){
        return back()->with('status','You have already booked this room');
      }else{
        DB::table('room_user')->insert(
                    [
                    'user_id' => $user->id,
                    'room_id' => $room->id,
                    'from_date'=>$from_date,
                    'to_date'=>$to_date,
                    'created_at'=>Carbon::now(),
                    'updated_at'=>Carbon::now(),
                    ]
                );


      }

      return back()->with('status','You have Succesfully booked this room');

        

        



    }

    private function hasBooked($user,$room){
         $booking =  Booking::where('user_id',$user)->where('room_id',$room)->first();
         if(count($booking)){
            return true;
         }else{
            return false;
         }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room = Booking::findOrFail($id);
        $room->delete($id);
        return redirect('bookings')->with('status','Successfully Dropped The House');
    }
}
