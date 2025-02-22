<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRegistrationModel extends Model
{
    protected $fillable = [
        'name',
        'father_name',
        'mother_name',
        'address',
        'current_job',
        'mobile_number',
        't_shirt_size',
        'ssc_result_status',
        'ssc_batch',
        'study_status_check',
        'study_year_count',
        'which_class',
        'participation_type',
        'take_come_children',
        'child_age_less_five',
        'child_age_more_five',
        'total_participant',
        'total_amount',
        'payment_status',
        'registrant_ID',
        'password',
        'registrant',
        'registrant_name',
        'registrant_mobile_number'
    ];

    protected $table = 'users';
}
