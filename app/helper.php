<?php

// echo "i am here for help";

use App\Models\Connection;
use Illuminate\Support\Facades\Auth;

function check($value)
{
    // $get_id = Connection::where('connection_id',$value)->where('status','accepted')->first();

          $get_id = Connection::where('status', 'accepted')
          ->where(function ($query) use ($value) {
              $query->where('user_id', $value)
                  ->orWhere('connection_id', $value);
          })
          ->first();

    if($get_id){
        return TRUE;
    }
    else{
        return FALSE;
     }

};
