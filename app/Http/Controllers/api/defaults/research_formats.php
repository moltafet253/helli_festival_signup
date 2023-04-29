<?php

namespace App\Http\Controllers\api\defaults;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class research_formats extends Controller
{
    public function researchFormats() {
        $research_formats = DB::table('research_formats')
            ->get()
            ->where('active', '=', 1);
        return $research_formats;
    }
}
