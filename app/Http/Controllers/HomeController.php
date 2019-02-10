<?php

namespace App\Http\Controllers;

use App\ListModel;
use App\Task;
use Illuminate\Http\Request;
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
        $user_id =  Auth::id();
        $lists = ListModel::where('list_status_id', '=', '1')
            ->where('author_id', '=', $user_id)
            ->get();

        return view('home',[
            'lists' => $lists
        ]);
    }
}
