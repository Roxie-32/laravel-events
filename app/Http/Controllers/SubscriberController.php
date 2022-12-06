<?php

namespace App\Http\Controllers;

use App\Events\UserRegistered;
use App\Models\Subscriber;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscriberController extends Controller
{
    public function subscribe(Request $request)
    {

        //validate the request data
        $validator = Validator::make($request->all(), [
            'email'  =>  'required|email',
        ]);

        if ($validator->fails()) {
            return new JsonResponse(['success' => false, 'message' => $validator->errors()], 422);
        }


        // subscribe to the newsletter
        Subscriber::create([
            'email' => $request->email
        ]);

        // call the event
        event(new UserRegistered($request->email));

        return new JsonResponse(['success' => true, 'message' => "Thank you for subscribing to the Sample newsletter!"], 200);
    }
}
