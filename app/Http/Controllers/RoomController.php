<?php

namespace App\Http\Controllers;

use App\Client;
use App\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('index', compact('rooms'));
    }

    public function booking($id, Request $request)
    {
        $room = Room::findOrFail($id);

        if($request->isMethod('post')){
            $request->validate(
                [
                    'name' => 'required|max:255',
                    'phone' => 'required|max:20',
                    'period_from' => 'required|date|after:now',
                    'period_to' => 'required|date|after:period_from',
                ]
            );

            $is_free = $room->period($request->period_from, $request->period_to)->get();

            if($is_free->count()){
                return back()->withErrors(['К сожалению, данный номер на указанный период уже кем-то забронирован']);
            }

            $client = Client::firstOrCreate([
                'phone' => $request->phone,
                'name' => $request->name
            ],

                $request->all()
            );

            $room->clients()->attach($client->id, ['period_from' => $request->period_from, 'period_to' => $request->period_to]);

            return back()->with(['message' => 'Success!']);
        }
        else{
            return view('rooms.booking', compact('room'));
        }
    }
}
