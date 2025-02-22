<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OpinionModel extends Model
{
    protected $fillable = ['name','ssc_batch', 'user_opinion'];
    protected $table = 'opinion';
}
