<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SearchRelay extends Model
{
    protected $fillable = [
        'searchTerm',
        'limit'
    ];
}
