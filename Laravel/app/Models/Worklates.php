<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Worklates extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'employee_id', 'latedate', 'timeselect','description'
    ];
}
