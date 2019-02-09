<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Task extends Model
{
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
}
