<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            return response()->json($validate->errors(), 403);

        $response = NostrService::Run(EngineScopes::GetUser, $validate->valid());

        return $response->json();
    }

    function friends(string $pubkey)
    {
        $validate = Validator::make([ 'pubkey' => $pubkey ], [
            'pubkey' => ['required', 'max:64', 'min:64']
        ]);

        if($validate->fails())
            return response()->json($validate->errors(), 403);

        $response = NostrService::Run(EngineScopes::GetFriends, $validate->valid());

        return $response->json();
    }

    function add(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => ['required', 'min:3', 'max:45'],
            'displayName' => ['required', 'min:3', 'max:45'],
            'pubkey' => ['required', 'max:64', 'min:64'],
            'profile' => ['required', 'max:150']
        ]);

        if($validate->fails())
            return response()->json($validate->errors(), 403);

        $response = NostrService::Run(EngineScopes::AddUser, $validate->valid());

        return $response->json();
    }

    function add_friends(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'pubkey' => ['required', 'min:64', 'max:64'],
            'friends' => ['required', 'array'],
            'friends.*' => ['string', 'min:64', 'max:64']
        ]);

        if($validate->fails())
            return response()->json($validate->errors(), 403);

        $response = NostrService::Run(EngineScopes::AddFriends, $validate->valid());

        return $response->json();
    }
}



