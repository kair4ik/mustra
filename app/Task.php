<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['name', 'date_start'];

    public function getDatesArray($dateStart)
    {
        $datesArray = [];
        for($i=0;$i<30;$i++) {
            $t = strtotime('+'.$i.' day 00:00:00');
            $datesArray[] = date('d-m-Y',$t);
        }
        return $datesArray;
    }
}
