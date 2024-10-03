<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

/**
 * @OA\Ignore
 */
enum EngineScopes: string {
    case GetUser = "get_user";
    case AddUser = "add_user";
    case GetFriends = "get_friends";
    case AddFriends = "add_friends";
    case SearchUsers = "search_users";
    case SearchFriends = "search_friends";
    case SearchRelays = "search_relays";
    case AddRelays = "add_relay";
}

class NostrService
{
    public static function Run(EngineScopes $scope, $params)
    {
        $apiUrl = env("URL_SEARCH_ENGINE");

        return Http::post($apiUrl.$scope->value, $params);
    }
}



