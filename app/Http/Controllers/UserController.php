<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Connection;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function sendRequest(Request $request)
    {
        Connection::create([
            'user_id' => Auth::user()->id,
            'connection_id' => $request->auth_id,
            'status' => 'pending'
        ]);
        return redirect()->back();
    }

    public function status(Request $request)
    {
        $connection = Connection::where('connection_id',$request->receive_id)->pluck('id')->first();

        $connect = Connection::find($connection);

        $connect->update([
            'status' => 'accepted'
        ]);

        return redirect()->back();
    }

    public function deleteConnection(Request $request)
    {
        $connection = Connection::where('connection_id',$request->connection_id)->pluck('id')->first();

        $connect = Connection::find($connection);

        $connect->delete();

        return redirect()->back();
    }

    public function withdrawRequest(Request $request)
    {
        $connection = Connection::where('user_id',Auth::user()->id)->where('connection_id',$request->with_draw_id)->pluck('id')->first();

        $connect = Connection::find($connection);

        $connect->delete();

        return redirect()->back();
    }

}
