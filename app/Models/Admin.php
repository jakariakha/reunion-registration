<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $fillable = ['mobile_number','password', 'role'];
    protected $table = 'admin';
}
