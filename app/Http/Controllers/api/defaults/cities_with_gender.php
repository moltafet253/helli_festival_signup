<?php

namespace App\Http\Controllers\api\defaults;

use App\Http\Controllers\Controller;
use App\Models\Helli\Provinces;
use Illuminate\Http\Request;

class cities_with_gender extends Controller
{
    public function cities($center, $province, $gender) {
        $cities = Provinces::select('shahr')
            ->where('markaz', '=', $center)
            ->where('ostan', '=', $province)
            ->where('gender', '=', $gender)
            ->distinct()
            ->orderBy('shahr', 'asc')
            ->get();
        return response()->json($cities);
    }
}
