<?php


namespace App\Http\Controllers\API;
use App\User;



use Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\EmergencyPush;

class EmergencyController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.verify');
    }

    public function store() {
        $input = request([
            "reporter",
            "reporting_for",
            "subject",
            "description",
            "urgency",
            "phone",
            "address",
            ]);
        Notification::send(User::all(),new EmergencyPush);
        return response()->json(['success'=> true], 200);
    }
}
