<?php

namespace App\Http\Controllers\api\defaults;

use App\Http\Controllers\Controller;
use App\Models\Helli\Provinces;
use Illuminate\Http\Request;

class schools_with_gender extends Controller
{
    public function schools($center, $province, $city, $gender) {
        $cities = Provinces::select('madrese')
            ->where('markaz', '=', $center)
            ->where('ostan', '=', $province)
            ->where('shahr', '=', $city)
            ->where('gender', '=', $gender)
            ->distinct()
            ->orderBy('madrese', 'asc')
            ->get();
        return response()->json($cities);
    }
}
