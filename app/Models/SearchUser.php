<?php

namespace App\Models;

use illuminate\http\request;

use Illuminate\Database\Eloquent\Model;

class SearchUser extends Model
{
    protected $fillable = [
        'pubkey',
        'searchTerm',
        'limit'
    ];

    public static function validate(Request $request)
    {
        $search = new SearchUser();
    }
}


