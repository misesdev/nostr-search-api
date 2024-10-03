<?php

namespace App\Http\Controllers;

use App\Services\EngineScopes;

use App\Services\NostrService;
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

        $response = NostrService::Run(EngineScopes::GetUser, $validate->valid());

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

        $response = NostrService::Run(EngineScopes::GetFriends, $validate->valid());

        return $response->json();
    }
}



