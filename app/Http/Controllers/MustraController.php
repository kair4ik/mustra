<?php

namespace App\Http\Controllers;

use App\ListModel;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class MustraController extends Controller
{
    public function create_form()
    {
        $model = new Task();

        $list =  ListModel::create([
            'date_start'=>date('Y-m-d',time()),
            'date_end'=> $model->getLastDay(),
            'author_id'=>Auth::id(),
        ]);
        return Redirect::action('MustraController@create', array('id' => $list->id));
    }

    public function create(Request $request)
    {
        $list_id = $request->id;
        $tasks = Task::getUniqueTasks($list_id);

        $list = ListModel::find($list_id);
        return view('create',[
                'list'=>$list,
                'tasks' => $tasks
            ]);
    }

    public function show(Request $request)
    {
        $list_id = $request->id;
        $tasks = Task::getUniqueTasks($list_id);

        $list = ListModel::find($list_id);
        return view('show',[
            'list'=>$list,
            'tasks' => $tasks
        ]);
    }

    public function save_list(Request $request)
    {
        $listId = $request->listId;
        $list = ListModel::find($listId);
        $list->name =  $request->listName;
        $list->list_status_id =  1;
        if ($list->save()) {
            return json_encode("success");
        } else {
            return json_encode("error");
        }
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

    public function change_task_status(Request $request)
    {
        $taskId = $request->taskId;
        $task = Task::find($taskId);
        $status_id = $task->changeStatus();
        return $status_id;
    }

}
