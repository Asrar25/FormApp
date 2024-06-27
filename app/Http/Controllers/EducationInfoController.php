<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\education;
use Validator;

class EducationInfoController extends Controller
{
    public function DataValidation(Request $req){

        $education_attended=$education_verifying=$prof_skill_certificate=false;
        $education_attended=Validator::make($req->all(),[
                                                'education_name'=>'required|max:50|alpha',
                                                'locate'=>'required|alpha',
                                                'date_attend'=>'required|date|date_format:Y-m-d',
                                                'major'=>'required|max:50|alpha',
                                                'minor'=>'required|max:50|alpha',
                                                'cgpa'=>'required|regex:/^\d+(\.\d{1})?$/|numeric',
                                                'major_gpa'=>'required|regex:/^\d+(\.\d{1})?$/|numeric',
                                                'no_of_hrs_per_week'=>'required|numeric'
                                               ],
                                               [
                                                'education_name.alpha'=>'Give only alphabetic character',
                                                'education_name.required'=>'educatiopn_name is required So please fill',
                                                'locate.alpa'=>'location is a alphabetic character not numeric placed',
                                                'date_attend.date_format'=>'Give y/m/d format of this date field',
                                                'major_gpa.regex'=>'The amount must be a numeric value with up to one decimal place',
                                                'no_of_hrs_per_week.numeric'=>'Does not accept alphabetic character!'
                                               ]);

        $education_verifying=Validator::make($req->all(),[
                                                'course_name'=>'required|max:20|alpha',
                                                'institue_name'=>'required|max:20|alpha',
                                                'credit_hrs'=>'required|numeric',
                                                'grade'=>'required|regex:/^[A-D][+-]?|F$/',
                                                'SAT_verbal'=>'required|numeric',
                                                'GRE_verbal'=>'required|numeric',
                                                'ACT'=>'required|numeric',
                                                'SAT_math'=>'required|numeric',
                                                'GRE_math'=>'required|numeric',
                                                'LSAT'=>'required|numeric',
                                                'SAT_Total'=>'required|numeric',
                                                'GRE_Total'=>'required|numeric',
                                                'GMAT'=>'required|numeric',
                                                'scholarship'=>'required|max:20|alpha'
                                               ],
                                               [
                                                'grade.regex'=>'Give valid grade'
                                               ]);
        $prof_skill_certificate=Validator::make($req->all(),[
                                                'CPA_status'=>'required|max:20|alpha',
                                                'state'=>'required|alpha',
                                                'license_no'=>'required|min:5|max:10',
                                                'active'=>'required|in:yes,no'
                                               ]);


        if($education_attended->fails())
        {
            return $education_attended->errors();
        }
        else if($education_verifying->fails()){
            return $education_verifying->errors();
        }
        else if($prof_skill_certificate->fails())
        {
            return $prof_skill_certificate->errors();
        }
        else{
            return['output'=>'Succesfully Validated'];
        }
}
}
