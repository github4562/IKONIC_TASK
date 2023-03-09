<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Connection;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Query for show users list in suggestion tab
        $suggestedUsers = User::where('id', '!=', Auth::user()->id)->get();

        // Query for show users list in Send Request tab to Login user where you send a request
        $requestData= Connection::where('user_id',Auth::user()->id)->Where('status', 'pending')->get();

        // Query for show users list in Received Request tab to Login user where you received a request
        $receiveData= Connection::where('connection_id',Auth::user()->id)->Where('status', 'pending')->get();

        // Query for show users list in Connections tab to Login user where user accepted a request
        $connectionData = Connection::where('status', 'accepted')
          ->where(function ($query) {
              $query->where('user_id', Auth::user()->id)
                    ->orWhere('connection_id', Auth::user()->id);
          })->get();

        return view('home')->with('suggestedUsers', $suggestedUsers)->with('requestData',$requestData)->with('receiveData',$receiveData)->with('connectionData',$connectionData);

    }
}
