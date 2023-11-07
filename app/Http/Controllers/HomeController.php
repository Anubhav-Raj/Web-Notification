<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');
        $users = User::all(); // Fetch all users from the database.

        return view('home', compact('users'));
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function saveToken(Request $request)
    {
        auth()->user()->update(['device_token'=>$request->token]);
        return response()->json(['token saved successfully.']);
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function sendNotification(Request $request)
    {

    $userID = $request->user_id; 
    $usersQuery = User::where('is_logged_in', true)->whereNotNull('device_token')->where('id', $userID);

        if ($usersQuery->count() === 0) {
            // No user found with the specified conditions
            if ($usersQuery->where('id', $userID)->count() === 0) {
                return response()->json(['error' => 'User not found.'], 404);
            } else {
                return response()->json(['error' => 'User is not logged in.'], 403);
            }
        }

    $firebaseToken = $usersQuery->pluck('device_token')->all();
   $SERVER_API_KEY = 'AAAA-hI1nkM:APA91bHHKFx9aysiHt85D8OEZFcN-MEfhW0ccR9j1RFedGmYkMCPvwN76MzosMuWeSCMl5Vlj9nnXYVhhx3mvJsY2litOXi8y-8QitEbkrjXWBEHsV9EciU83_jfGE1Bjp4t_JA0pNx6';
        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => $request->title,
                "body" => $request->body,
                "content_available" => true,
                "priority" => "high",
            ]
        ];
        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response = curl_exec($ch);

        dd($response);
    }
}
