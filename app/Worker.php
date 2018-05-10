<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    //
    protected $table = 'workers';

    public $fillable = ['surname','name','patronymic','born','position','salary'];
}
