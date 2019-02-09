<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['name', 'date'];

    public function getDatesArray()
    {
        $days = 5;
        $datesArray = [];
        for($i=0;$i < $days;$i++) {
            $t = strtotime('+'.$i.' day 00:00:00');
            $datesArray[] = date('d-m-Y',$t);
        }
        return $datesArray;
    }
}
