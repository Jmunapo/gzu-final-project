<?php

namespace App\Http\Controllers;

use App\Student;
use App\Applicant;
use App\Programme;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('jwt.verify', ['except' => ['login']]);
    }

    public function refresh()
    {
        return $this->respondWithToken(auth('api')->refresh());
    }


    public function login()
    {
        $credentials = request(['reg_number', 'password']);
        try {
            if (! $token = auth('api')->attempt($credentials)) {
                return response()->json(['error' => 'Invalid Credentials'], 401);
            }

            return $this->respondWithToken($token);
            
        } catch (\Throwable $th) {

            return response()->json(['error' => 'could_not_create_token'], 500);
            
        }

        
    }

    public function me()
    {
        try {

            return response()->json(auth('api')->user());

        } catch (\Throwable $th) {

            return response()->json(['error' => 'token_error'], 500);

        }
        
    }

    public function logout()
    {
        auth('api')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    protected function respondWithToken($token)
    {
        
        return response()->json([
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => auth('api')->factory()->getTTL() * 60// valid for 1 week
        ]);
    }



    public function getProfile(){
        $user = auth('api')->user();

        if(!isset($user)){
            return response()->json(['error' => 'Student not found'], 401); 
        }

        $student = Student::find($user->id);

        $applicant = Applicant::find($student->applicant_id);

        $programme = Programme::find($student->programme_id);
        

        if(!isset($applicant) || !isset($programme) ){
            return response()->json(['error' => 'Applicant or Programme not found'], 401);
        }

        $profile = (object) array();

        $profile->firstname = $applicant->firstname;
        $profile->lastname = $applicant->lastname;
        $profile->sex = $applicant->sex;
        $profile->place_of_birth = $applicant->place_of_birth;
        $profile->date_of_birth = $applicant->date_of_birth;
        $profile->national_id_number = $applicant->national_id_number;
        $profile->province = $applicant->province;
        $profile->religion = $applicant->religion;
        $profile->address = $applicant->address;
        $profile->phone = $applicant->phone;
        $profile->nationality = $applicant->nationality;
        $profile->citizenship = $applicant->citizenship;

        $profile->next_of_kin_name = $applicant->next_of_kin_name;
        $profile->next_of_kin_address = $applicant->next_of_kin_address;
        $profile->next_of_kin_phone = $applicant->next_of_kin_phone;


        $profile->reg_number = $student->reg_number;
        $profile->intake_type = $student->intake_type;
        $profile->graduate_level = $programme->graduate_level;
        $profile->programme_name = $programme->programme_name;
        return response()->json($profile);
    }


}
