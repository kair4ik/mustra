<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListModel extends Model
{
    protected $table = 'lists';

    protected $fillable = ['name', 'date_start','author_id','date_end'];

    public function getDayFromDate($days)
    {
        return date('Y-m-d H:i:s', strtotime($this->date_start. ' + '.$days.' days'));
    }

}
