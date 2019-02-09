<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MustraController extends Controller
{
    //
    public function create()
    {
        $datesArray = [];
        for($i=0;$i<30;$i++) {
            $t = strtotime('+'.$i.' day 00:00:00');
            $datesArray[] = date('d-m-Y',$t);
        }
//        var_dump($datesArray);

        return view('create',[
//                'date'=>$date
            ]);
    }

    public function create_list()
    {
        return "responce from server";
    }
}
