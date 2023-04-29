<?php

namespace App\Http\Controllers\api\defaults;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class research_types extends Controller
{
    public function researchTypes() {
        $research_types = DB::table('research_types')->get()->where('active', '=', 1);
        return $research_types;
    }
}
