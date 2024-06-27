<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\generalinfo;
use Validator;

class GeneralInfoController extends Controller
{
    public function DataValidation(Request $request){
            $validator=Validator::make($request->all(),[
                                                     'fullname'=>'required|min:3|max:20|alpha',
                                                     'phone_number'=>'required|digits:10',
                                                     'fax_number'=>'required|regex:/^\+\d{2}\d{10}$/',
                                                     'email'=>'required|email',
                                                     'address'=>'required',
                                                     'position'=>'required',
                                                     'present_salary'=>'required|regex:/^\d+(\.\d{1,2})?$/',
                                                     'salary_desire'=>'required|regex:/^\d+(\.\d{1,2})?$/',
                                                     'date'=>'required|date|date_format:Y-m-d',
                                                     'ptime/ftime'=>'required|in:PartTime,FullTime',
                                                     'llc_applied_sb'=>'required|in:yes,no',
                                                     'where_applied'=>'max:255',
                                                     'find_sb'=>'required',
                                                     'legally_to_work'=>'required|in:yes,no',
                                                     'sponsorship_employement'=>'required|in:yes,no',
                                                     'convicted_crime'=>'required|in:yes,no'
                                                   ],
                                                   [
                                                     'fullname.required'=>'we need to know full name!',
                                                     'fullname.alpha'=>'fullname field contain only aplhabets character!',
                                                     'fax_number.regex'=>'Give the correct format of fax number',
                                                     'email.required'=>'without email,not proceed',
                                                     'position.required'=>'we need to know position!',
                                                     'present_salary.regex'=>'The salary must be a numeric value with up to 2 decimal places.',
                                                     'present_salary.numeric'=>'The salary must be a numeric value.',
                                                     'salary_desire.regex'=>'The salary must be a numeric value with up to 2 decimal places.',
                                                     'salary_desire.numeric'=>'The salary must be a numeric value.',
                                                     'date.date_format'=>'Give y/m/d format of this date field',
                                                     //  'email.unique' => 'This email is already registered with us.',
                                                     'email.email' => 'Your email does not appear to be valid.',
                                                     'ptime/ftime.in' => 'The ptime/ftime must be either "Partime" or "Fulltime".',
                                                     'llc_applied_sb.in' => 'The llc_applied_sb must be either "yes" or "no".',
                                                     'where_applied'=>'text length must be 20!',
                                                     'legally_to_work.in' => 'The legally_to_work must be either "yes" or "no".',
                                                     'sponsorship_employement.in' => 'The sponsorship_employement must be either "yes" or "no".',
                                                     'convicted_crime.in' => 'The convicted_crime must be either "yes" or "no".',
                                                   ]
                                       );
            if($validator->fails()){
                return $validator->errors();
            }else{
                return['output'=>'Succesfully Validated'];
            }

    }
}
