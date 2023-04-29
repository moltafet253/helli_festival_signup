<?php

namespace App\Http\Controllers\api\defaults;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class scientific_groups extends Controller
{
    function scientificGroups() {
        $scientific_groups = DB::table('scientific_groups')->get()->where('active', '=', 1);
        return $scientific_groups;
    }
}
