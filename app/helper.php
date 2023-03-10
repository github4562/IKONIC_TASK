<?php

// echo "i am here for help";

use App\Models\Connection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

function check($value)
{
    $get_id = Connection::where('status', 'accepted')
    ->where(function ($query) use ($value) {
        $query->where('user_id', Auth::id())
            ->Where('connection_id', $value);
    })
    ->first();

    if($get_id){
        return TRUE;
    }
    else{
        return FALSE;
     }

};


function check_mutual_friend($value)
{
    $userId = Auth::id();
    $friendId = $value;

    $mutualFriends = DB::table('connections as f1')
    ->join('connections as f2', function($join) use ($userId, $friendId) {
        $join->on('f1.connection_id', '=', 'f2.connection_id')
            ->where('f1.user_id', '=', $userId)
            ->where('f2.user_id', '=', $friendId);
    })
    ->join('users', 'users.id', '=', 'f1.connection_id')
        ->select('users.*')
        ->get();

        if($mutualFriends){
            return count($mutualFriends);
        }
        else{
            return FALSE;
         }

};
