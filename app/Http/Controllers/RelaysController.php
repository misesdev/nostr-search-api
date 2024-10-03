<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\NostrService;
use App\Services\EngineScopes;
use Illuminate\Support\Facades\Validator;

class RelaysController extends Controller
{
    function search(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'searchTerm' => ['required', 'min:3', 'max:100'],
            'limit' => ['numeric', 'min:1', 'max:100']
        ]);

        if($validate->fails())
            return response()->json($validate->errors(), 403);

        $response = NostrService::Run(EngineScopes::SearchRelays, $validate->valid());

        return $response->json();
    }

    function add(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'address' => ['required', 'min:5', 'max:100', 'regex:/^wss:\/\/.*/']
        ]);

        if($validate->fails())
            return response()->json($validate->errors(), 403);

        $response = NostrService::Run(EngineScopes::AddRelays, $validate->valid());

        return $response->json();
    }
}


