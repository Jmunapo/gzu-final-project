<?php

namespace App\Http\Controllers\API;

use App\User;
use Notification;
use App\Applicant;

use App\Programme;
use File;
use Illuminate\Http\Request;
use App\Notifications\PushDemo;
use App\Http\Controllers\Controller;

class ApplicantsController extends Controller
{
    public function apply()
    {
        $applicant = request()->all();
        $created = Applicant::create($applicant);
        Notification::send(User::all(),new PushDemo);
        return response()->json(['success'=> true], 200);
    }

    public function programmes() {
        return response()->json(Programme::all());
    }

    public function filehandler(){
        if(!request()->hasFile('file')) {
        return response()->json(['upload_file_not_found'], 400);
        }
        $file = request()->file('file');
        if(!$file->isValid()) {
        return response()->json(['invalid_file_upload'], 400);
        }
        $path = public_path() . '/uploads/';
        $file->move($path, $file->getClientOriginalName() );
        return response()->json(['file saved'=> true], 201);
    }

    public function delFile(){
        if(!request()->has('fileName')){
            return response()->json(['Supply a file name'], 400);
        }
        $path = public_path() . '/uploads/';
        $file = request()->input('fileName');
        File::Delete($path . $file);
        return response()->json(['file deleted'=> true], 200);
    }
}
