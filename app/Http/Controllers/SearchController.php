<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Services\EngineScopes;
use \App\Services\NostrService;

class SearchController extends Controller
{
    function index(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'pubkey' => ['required', 'size:64', 'regex:/^[a-fA-F0-9]+$/'],
            'searchTerm' => ['required', 'min:3', 'max:100'],
            'limit' => ['numeric', 'min:1', 'max:100']
        ]);

        if($validate->fails())
        {
            return response()->json($validate->errors(), 403);
        }

        $response = NostrService::Run(EngineScopes::SearchUsers, $validate->valid());

        return $response->json();
    }

    function friends(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'pubkey' => ['required', 'size:64', 'regex:/^[a-fA-F0-9]+$/'],
            'searchTerm' => ['required', 'min:3', 'max:100'],
            'limit' => ['numeric', 'min:1', 'max:100']
        ]);

        if($validate->fails())
        {
            return response()->json($validate->errors(), 403);
        }

        $response = NostrService::Run(EngineScopes::SearchFriends, $validate->valid());

        return $response->json();
    }

}





