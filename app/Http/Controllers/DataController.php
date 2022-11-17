<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User_info;
use App\Models\UserData;
use App\Models\Matched_Mates;
use Illuminate\Validation\Rules\Unique;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{

    public function index(){
        return view("Home");
    }
    //
    public function storeData(Request $request){

        $dataString = $request->input('sms');
        // $userPhoneNumber = $request->input('userPhoneNumber');

        $array = explode('#', $dataString);

        if($array[0] != "MPENZI"){
            
            return back()->with('errorService', 'Unknown Service, Please try again');
        }else{

            $service_identifier = $array[0];
            $user_name = $array[1];
            $user_location = $array[2];
            $user_gender = $array[3];
            $user_age = $array[4];
            $soulMateLoaction = $array[5];
            $soulMateAge = $array[6];
            $soulMateGender = $array[7];   
            
           $request->validate([
            'user_phone_number'=>['required','unique:user_data']
           ]);

           $userInfo = new User_info([
            "userInfo_name"=>$user_name,
            "userInfo_phone_number"=>$request->user_phone_number,
            "userInfo_location"=>$user_location,
            "userInfo_gender"=>$user_gender,
            "userInfo_age"=>$user_age
           ]);
           $userInfo->save();

           $userData = new UserData([
            "user_name"=>$user_name,
            "user_phone_number"=>$request->user_phone_number,
            "user_location"=>$user_location,
            "user_gender"=>$user_gender,
            "user_age"=>$user_age,
            "soulMate_location"=>$soulMateLoaction,
            "soulMate_Age"=>$soulMateAge,
            "soulMate_gender"=>$soulMateGender
           ]);

           $checkResult = $userData->save();

           if($checkResult){

            $fetchMatch = UserData::where('user_location', $soulMateLoaction)
            ->where('user_gender', $soulMateGender)->where('user_age', $soulMateAge)->first();
            
            if($fetchMatch){
                $name = $fetchMatch->user_name;
                $phone = $fetchMatch->user_phone_number;
                $loc = $fetchMatch->user_location;

                    $matched = new Matched_Mates([
                    "user_name"=>$user_name,
                    "user_phone"=>$request->user_phone_number,
                    "user_location"=>$user_location,
                    "soulmate_name"=>$name,
                    "soulmate_phone"=>$phone,
                    "soulMate_location"=>$loc     
                ]);
                $matched->save();
                return back()->with('successSaved', 'Data Saved Successfully');
            }else{
                return back()->with('successSaved', 'Data Saved Successfully');
            }
           }
           else
           {
            return back()->with('errorMessage','data not saved');
           }
            
        }
      
    }


}
