<?php

namespace App\Http\Controllers\api\defaults;

use App\Http\Controllers\Controller;
use App\Models\Helli\Provinces;
use Illuminate\Http\Request;

class cities_without_gender extends Controller
{
    public function cities($province) {
        $cities = Provinces::select('shahr')
            ->where('ostan', '=', $province)
            ->distinct()
            ->orderBy('shahr', 'asc')
            ->get();
        return response()->json($cities);
    }
}
