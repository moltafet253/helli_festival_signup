<?php

namespace App\Http\Controllers\api\defaults;

use App\Http\Controllers\Controller;
use App\Models\Helli\Provinces;
use Illuminate\Http\Request;

class schools_without_gender extends Controller
{
    public function schools($city) {
        $cities = Provinces::select('madrese')
            ->where('shahr', '=', $city)
            ->distinct()
            ->orderBy('madrese', 'asc')
            ->get();
        return response()->json($cities);
    }
}
