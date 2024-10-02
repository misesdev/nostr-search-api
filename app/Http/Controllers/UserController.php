<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    function index(string $pubkey)
    {
        $validate = Validator::make([ 'pubkey' => $pubkey ], [
            'pubkey' => ['required', 'max:64', 'min:64']
        ]);

        if($validate->fails())
        {
            return response()->json($validate->errors(), 403);
        }

        $response = Http::post("http://192.168.0.11:8080/get_user", $validate->valid());

        return $response->json();
    }

    function friends(string $pubkey)
    {
        $validate = Validator::make([ 'pubkey' => $pubkey ], [
            'pubkey' => ['required', 'max:64', 'min:64']
        ]);

        if($validate->fails())
        {
            return response()->json($validate->errors(), 403);
        }

        $response = Http::post("http://192.168.0.11:8080/get_friends", $validate->valid());

        return $response->json();
    }
}



