<?php

namespace App\Http\Controllers\Admin;

use App\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    private $validation_rules_create = [
        'name' => 'required|max:255|unique:rooms',
        'number' => 'required|max:255|unique:rooms',
    ];

    private $validation_rules_edit = [
        'name' => 'required|max:255',
        'number' => 'required|max:255',
    ];

    public function booking_index()
    {
        $rooms = Room::has('clients')->get();

        return view('admin.rooms.booking_index', compact('rooms'));
    }

    public function index()
    {
        $rooms = Room::all();
        return view('admin.rooms.index', compact('rooms'));
    }

    public function create()
    {
        return view('admin.rooms.create-edit');
    }

    public function edit($id)
    {
        $room = Room::findOrFail($id);
        return view('admin.rooms.create-edit', compact('room'));
    }

    public function show($id)
    {
        $room = Room::findOrFail($id);
        return view('admin.rooms.show', compact('room'));
    }

    public function update($id, Request $request)
    {
        $request->validate($this->validation_rules_edit);
        $room = Room::findOrFail($id);

        $room->name = $request->name;
        $room->number = $request->number;
        $room->short_description = $request->short_description;

        if($request->image){
            $image = $request->file('image')->store('rooms/'.$room->name.'/images/', 'public');
            $room->image = $image;
        }

        $room->save();

        return back()->with('message', 'Room was successfully updated');

    }

    public function store(Request $request)
    {
        $request->validate($this->validation_rules_create);

        $room['name'] = $request->name;
        $room['number']= $request->number;
        $room['short_description'] = $request->short_description;

        if($request->image){
            $image = $request->file('image')->store('rooms/'.$room['name'].'/images/', 'public');
            $room['image'] = $image;
        }

        $room = Room::create($room);


        $room->save();

        return redirect()->route('admin.rooms.edit', ['id' => $room->id])->with('message', 'Room was successfully created');
    }
}
