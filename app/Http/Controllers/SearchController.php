<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use \App\Models\SearchUser;
use \App\Models\SearchRelay;
use \App\Services\NostrService;

class SearchController extends Controller
{
    function index(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'pubkey' => ['required', 'max:64', 'min:64'],
            'searchTerm' => ['required', 'min:3'],
            'limit' => ['max:100']
        ]);

        if($validate->fails())
        {
            return response()->json($validate->errors(), 403);
        }

        $params = $validate->valid();

        return response()->json($params, 200);
    }

    function friends(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'pubkey' => ['required', 'max:64', 'min:64'],
            'searchTerm' => ['required', 'min:3'],
            'limit' => ['max:100']
        ]);

        if($validate->fails())
        {
            return response()->json($validate->errors(), 403);
        }

        return response()->json($validate->valid(), 200);
    }

    function relays(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'searchTerm' => ['required', 'min:3'],
            'limit' => ['max:100']
        ]);

        if($validate->fails())
        {
            return response()->json($validate->errors(), 403);
        }

        return response()->json($validate->valid(), 200);
    }
}





