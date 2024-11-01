<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Room;
use Hash;
use Auth;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $rooms = Room::select('id', 'name', 'price')->orderBy('name')->paginate(10);

        return view('admin.room.list_room', compact('rooms'));
    }

    public function add()
    {
        return view('admin.room.add_room');
    }

    public function edit()
    {
        $rooms =  Room::find(request()->id);

        return view('admin.room.edit_room', compact('rooms'));
    }

    public function update(Request $request)
    {
        $array = collect($request->all());
        $collect = $array->except(['_token', 'id']);
        $collect = $collect->toArray();

        if (DB::table('room')->where('id', $request->input('id'))->update($collect)) {
            session()->flash('alert-success', 'Kamar sudah diupdate!');
            return redirect()->route('list.room');
        }
        return redirect()->back();
    }

    public function delete()
    {
        DB::table('room')->where('id', request()->id)->delete();
        session()->flash('alert-success', 'Room is Deleted!');
        return redirect()->route('list.room');
    }

    public function save(Request $request)
    {
        $data = [
            'name' => $request->input('name'),
            'price' => $request->input('price'),
        ];

        $validator = Validator::make($data, [
            'name' => 'required',
            'price' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('add.room')->withErrors($validator)->withInput();
        }

        $room = new Room($data);

        if ($room->save()) {
            session()->flash('alert-success', 'New Room Created!');
            return redirect()->route('list.room');
        }
        return redirect()->back();
    }
}
