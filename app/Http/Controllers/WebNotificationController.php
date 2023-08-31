<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Models\User;

    class WebNotificationController extends Controller
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
            return view('home');
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
        public function sendNotification($title,$body)
        {
            //firebaseToken berisi seluruh user yang memiliki device_token. jadi notifnya akan dikirmkan ke semua user
            //jika kalian ingin mengirim notif ke user tertentu batasi query dibawah ini, bisa berdasarkan id atau kondisi tertentu

            $firebaseToken = User::whereNotNull('device_token')->pluck('device_token')->all();

            $SERVER_API_KEY = 'AAAAmpYDQ_0:APA91bF41S6vrSatqVIeoo8NfoV5ILOMFKvlLGXUjsh2y1hGpOF2_shjxekoaVdPlsSRrSX-rNQm8c4RCBWT67hrv4wVYDs__WeC9DZ57lBAb_Vu53ZZChX4OUVRpCBgRA8TsjiwKrND';

            $data = [
                "registration_ids" => $firebaseToken,
                "notification" => [
                    "title" => $title,
                    "body" => $body,
                    "icon" => 'https://cdn.pixabay.com/photo/2016/05/24/16/48/mountains-1412683_960_720.png',
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
        }
    }
