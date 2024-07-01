<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class generalinfo extends Model
{
    use HasFactory;
    protected $table='generalinfo';

    public $timestamps = false;
    protected $fillable=[
                            'FullName',
                            'PhoneNumber',
                            'FaxNumber',
                            'Email',
                            'Address',
                            'Position',
                            'PresentSalary',
                            'SalaryDesire',
                            'Date',
                            'Time',
                            'AlreadySB',
                            'Where',
                            'Application',
                            'LegallyWork',
                            'SponsorshipEmnployement',
                            'ConvictedCrime'
    ];

}
