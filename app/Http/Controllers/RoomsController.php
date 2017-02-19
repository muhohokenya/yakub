<?php

namespace App\Http\Controllers;
use App\Service;
use App\Room;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rooms = Room::all();
        $data_array = array(
            'rooms'=>$rooms,
        );
        return view('rooms.index',$data_array);
    }


    public function get_available_rooms()
    {
        # code...
        $rooms = Room::all();
        $data_array = array(
            'rooms'=>$rooms,
        );
         return view('rooms.available',$data_array);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $services = Service::all();
        $data_array = array(
            'services'=>$services,
        );
        return view('rooms.new',$data_array);
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
         $this->validate($request,[
           'room'=>'required',
           'charges'=>'required|integer',
        ]);

         $room = $request->room;
         $charges = $request->charges;

         $room_object = new Room();
         $room_object->number = $room;
         $room_object->charges = $charges;
         $room_object->save();


          $services = $request->services;
         
          if(is_array($services)){

                 foreach ($services as $service) {
                  DB::table('room_service')->insert(
                    ['room_id' => $room,'service_id' => $service]
                );
          }
          }

         
          
          return redirect('/rooms');
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
