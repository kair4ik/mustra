<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Task extends Model
{

    const STATUS_NOT_ACTIVE = 0;
    const STATUS_DONE = 1;
    const STATUS_NOT_PERFORMED = 2;
    const STATUS_NOT_PERF_SPECIAL = 3;

    protected $fillable = ['list_id', 'name', 'date'];
    private $days = 10;

    public function getDatesArray()
    {
        $datesArray = [];
        for($i=0;$i <= $this->days;$i++) {
            $t = strtotime('+'.$i.' day 00:00:00');
            $datesArray[] = date('d.m.Y',$t);
        }
        return $datesArray;
    }



    public function getLastDay()
    {
        $dates = $this->getDatesArray();
        $lastDate = end($dates);
        return $lastDate;
    }

    static public function getTasks($list_id)
    {
        $tasks = self::where('list_id', '=', $list_id)->get();
        return $tasks;
    }

    public function getTasks2()
    {
        $tasks = self::where('list_id', '=', $this->list_id)->get();
        return $tasks;
    }

    public function getTasksForDate()
    {
        $tasks = self::where('date', '=', $this->list_id)->get();
        return $tasks;
    }

    static public function getUniqueTasks($list_id)
    {
        $results = DB::select('select distinct (name) from tasks where list_id = ?', [$list_id]);

        return self::dataConvertToArray($results);
    }

    static public function dataConvertToArray($data)
    {
        $result = [];
        foreach ($data as $item) {
            $result[] = $item->name;
        }

        return $result;
    }

    /**
     * @return int
     */
    public function getDays(): int
    {
        return $this->days;
    }

    static public function getTaskByParam($name, $date, $list_id)
    {
        $result = DB::select(
            'select * from tasks where list_id = :list_id  and  date = :date and name = :name;',
                [
                'list_id'=>$list_id,
                'date'=>$date,
                'name'=>$name,
                ]);

        return $result;
    }

    static public function getDescBy($status_id)
    {
        $model = Status::find($status_id);
        if (isset($model)) {
            return $model->color;
        }
        return "";
    }

    public function changeStatus()
    {
        if ($this->isNotStatus() || $this->isNotPerfSpecial()) {
            $this->status_id = self::STATUS_DONE;
        } else if ($this->isDone()) {
            $this->status_id = self::STATUS_NOT_PERFORMED;
        } else if ($this->isNotPerformed()) {
            $this->status_id = self::STATUS_NOT_PERF_SPECIAL;
        }
        $this->save();
        return $this->status_id;
    }

    public function isNotStatus()
    {
        return $this->status_id == self::STATUS_NOT_ACTIVE ? true : false;
    }

    public function isDone()
    {
        return $this->status_id == self::STATUS_DONE ? true : false;
    }

    public function isNotPerformed()
    {
        return $this->status_id == self::STATUS_NOT_PERFORMED ? true : false;
    }

    public function isNotPerfSpecial()
    {
        return $this->status_id == self::STATUS_NOT_PERF_SPECIAL ? true : false;
    }

    static public function getTotalByParam($list_id, $date)
    {
        $totalStatus = "";
        $tasks = DB::select(
            'select * from tasks where list_id = :list_id  and  date = :date;',
            [
                'list_id'=>$list_id,
                'date'=>$date,
            ]);
//        dd($tasks);
        foreach ($tasks as $task){

            if ($task->status_id == self::STATUS_NOT_PERFORMED) {
                return "danger";
            }
            if ($task->status_id == self::STATUS_DONE || $task->status_id == self::STATUS_NOT_PERF_SPECIAL) {
                $totalStatus = "success";
            }
        }

        return $totalStatus;
    }

}
