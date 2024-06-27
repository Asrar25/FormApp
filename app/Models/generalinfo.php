<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class generalinfo extends Model
{
    use HasFactory;
    protected $table='generalinfo';
    protected $fillable=[
                            'fullname',
                            'phone_number',
                            'fax_number',
                            'email',
                            'position',
                            'present_salary',
                            'salary_desire',
                            'date',
                            'ptime/ftime',
                            'llc_applied_sb',
                            'where_applied',
                            'find_sb',
                            'legally_to_work',
                            'sponsorship_emnployement',
                            'convicted_crime',
    ];

}
