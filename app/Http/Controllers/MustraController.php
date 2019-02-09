<?php

namespace App\Http\Controllers;

use App\ListModel;
use App\Task;
use Illuminate\Http\Request;

class MustraController extends Controller
{
    public function create()
    {
//        var_dump($datesArray);

        $list =  ListModel::create(array('date_start'=>date('d.m.Y',time())));
        return view('create',[
                'list'=>$list
            ]);
    }

    public function create_list()
    {
        $list =  ListModel::create(array('name' => 'Fist lsit', 'date_start'=>'01.01.2019'));
        return $list->id;
    }

    public function create_task(Request $request)
    {
        $taskName = $request->taskName;
        $listId = $request->listId;
        $task = new Task();
        $dates = $task->getDatesArray();
        foreach ($dates as $date){
           Task::create(['list_id'=>$listId,'name' => $taskName, 'date'=>$date]);
        }

        return json_encode($taskName);
    }

}
