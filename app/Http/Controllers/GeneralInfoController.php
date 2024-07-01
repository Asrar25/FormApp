<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\generalinfo;
use Validator;

class GeneralInfoController extends Controller
{
    public function DataValidation(Request $request){
            $validator=Validator::make($request->all(),[
                                                     'FullName'=>'required|min:3|regex:/^[a-zA-Z\s]+$/',
                                                     'PhoneNumber'=>'required|digits:10',
                                                     'FaxNumber'=>'required|regex:/^\+\d{2}\d{10}$/',
                                                     'Email'=>'required|email|unique:generalinfo,email',
                                                     'Address'=>'required',
                                                     'Position'=>'required',
                                                     'PresentSalary'=>'required|regex:/^\d+(\.\d{1,2})?$/',
                                                     'SalaryDesire'=>'required|regex:/^\d+(\.\d{1,2})?$/',
                                                     'Date'=>'required|date|date_format:Y-m-d',
                                                     'Time'=>'required|in:PartTime,FullTime',
                                                     'AlreadySB'=>'required|in:yes,no',
                                                     'Where'=>'max:255',
                                                     'Application'=>'required',
                                                     'LegallyWork'=>'required|in:yes,no',
                                                     'SponsorshipEmployement'=>'required|in:yes,no',
                                                     'ConvictedCrime'=>'required|in:yes,no'
                                                   ],
                                                   [
                                                     'FullName.required'=>'FullName Field is Required',
                                                     'FullName.regex'=>'FullName field contain only Aplhabets Character!',
                                                     'FaxNumber.regex'=>'Give the correct format of FaxNumber',
                                                     'Email.required'=>'Email Field is Required',
                                                     'Position.required'=>'Position Field is Required',
                                                     'PresentSalary.regex'=>'The Present_Salary must be a numeric value with up to 2 decimal places.',
                                                     'PresentSalary.numeric'=>'The Present_Salary must be a numeric value.',
                                                     'SalaryDesire.regex'=>'The Salary_Desire must be a numeric value with up to 2 decimal places.',
                                                     'SalaryDesire.numeric'=>'The Salary_Desire must be a numeric value.',
                                                     'Date.date_format'=>'Give y/m/d format of this Date Field',
                                                     'Email.unique' => 'This Email is already registered with us.',
                                                     'Email.email' => 'Invalid Email!!.',
                                                     'Time.in' => 'The Time Field must be either "Partime" or "Fulltime".',
                                                     'AlreadySB.in' => 'The Already_SB must be either "yes" or "no".',
                                                     'Application'=>'Application Field must be Required!',
                                                     'LegallyWork.in' => 'The Legally_Work must be either "yes" or "no".',
                                                     'SponsorshipEmployement.in' => 'The Sponsorship_Employement must be either "yes" or "no".',
                                                     'ConvictedCrime.in' => 'The Convicted_Crime must be either "yes" or "no".',
                                                   ]
                                       );
            if($validator->fails()){
                return response()->json([
                    'error' => $validator->errors()
                ]);
            }else{
                $data = $validator->validated();

                $user = new generalinfo;
                $user->FullName = (string) $data['FullName'];
                $user->PhoneNumber = $data['PhoneNumber'];
                $user->FaxNumber = $data['FaxNumber'];
                $user->Email = (string)$data['Email'];
                $user->Address = (string)$data['Address'];
                $user->Position = (string) $data['Position'];
                $user->Present_Salary = $data['PresentSalary'];
                $user->Salary_Desire = $data['SalaryDesire'];
                $user->Date = (string)$data['Date'];
                $user->Time = (string)$data['Time'];
                $user->Already_SB = (string)$data['AlreadySB'];
                $user->Where = (string)$data['Where'];
                $user->Application = (string)$data['Application'];
                $user->Legally_Work = (string)$data['LegallyWork'];
                $user->Sponsorship_Employement =(string) $data['SponsorshipEmployement'];
                $user->Convicted_Crime = (string)$data['Convicted_Crime'];
                $user->save();

                return response()->json([
                    'output' => 'Validation passed and data saved successfully!'
                ]);
            }

    }
}
