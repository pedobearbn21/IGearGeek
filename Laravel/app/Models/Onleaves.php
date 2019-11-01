<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Onleaves extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'employee_id', 'start_date', 'end_date', 'type', 'status', 'file', 'description','period'
    ];
    public $timestamps = false;
}
