<?php

namespace App\Http\Controllers\api\defaults;

use App\Http\Controllers\Controller;
use App\Models\Helli\SpecializedCenters;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class specialized_centers extends Controller
{
    public function specialCenters()
    {
        $special_sections = SpecializedCenters::get()->where('active', '=', 1);
        return $special_sections;
    }
}
