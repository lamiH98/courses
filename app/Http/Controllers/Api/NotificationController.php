<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Traits\GeneralTrait;

class NotificationController extends Controller
{
    use GeneralTrait;

    public function saveToken(Request $request)
    {
        auth()->user()->update(['device_token' => $request->token]);
        return response()->json(['token saved successfully.']);
    }

    public function sendNotification(Request $request)
    {
        // dd($request->all());
        // return response()->json(['token saved successfully.']);
        $firebaseToken = User::whereNotNull('device_token')->pluck('device_token')->all();

        $SERVER_API_KEY = 'AAAAM3kucuE:APA91bGDK7CkPEs3WuY5jHdI9vEPKvpmpyjE7wg1POKvweri6ERX973mjrvHliJPHdr-aTJG-UzAJ9PAggC96oBWpkTOsH0gpqr18gqcNSvY82ZWzdkkcB0Dp8FALsUbMDc0vLwKz9oA';

        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => $request->title,
                "body" => $request->body,
            ],
            "priority" => "high",
            "data" => [
                "clickaction" => "FLUTTERNOTIFICATIONCLICK",
                "id" => "1",
                "status" => "done"
            ],
            // "to" => "/topics/all"
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

        $notification = curl_exec($ch);
        return $this->sendResponse('notification', $notification);
        // return $response;
        // dd($response);
    }
}
