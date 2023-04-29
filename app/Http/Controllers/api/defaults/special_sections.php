<?php

namespace App\Http\Controllers\api\defaults;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class special_sections extends Controller
{
    public function specialSections() {
        $special_sections = DB::table('special_sections')->get()->where('active', '=', 1);
        return $special_sections;
    }
}
