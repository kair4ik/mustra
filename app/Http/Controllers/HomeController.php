<?php

namespace App\Http\Controllers;

use App\ListModel;
use App\Task;
use Illuminate\Http\Request;

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
        $lists = ListModel::where('list_status_id', '=', '1')->get();

        return view('home',[
            'lists' => $lists
        ]);
    }
}
