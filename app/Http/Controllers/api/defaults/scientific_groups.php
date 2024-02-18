<?php

namespace App\Http\Controllers\api\defaults;

use App\Http\Controllers\Controller;
use App\Models\Helli\ScientificGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class scientific_groups extends Controller
{
    function scientificGroups()
    {
        $scientific_groups = ScientificGroup::where('active', 1)->orderBy('title')->get();
        return $scientific_groups;
    }
}
