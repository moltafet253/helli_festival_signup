<?php

namespace App\Http\Controllers\api\defaults;

use App\Http\Controllers\Controller;
use App\Models\Helli\ResearchType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class research_types extends Controller
{
    public function researchTypes()
    {
        $research_types = ResearchType::get()->where('active', '=', 1);
        return $research_types;
    }
}
