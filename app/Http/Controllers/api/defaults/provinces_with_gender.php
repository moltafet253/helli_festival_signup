<?php

namespace App\Http\Controllers\api\defaults;

use App\Http\Controllers\Controller;
use App\Models\Helli\Provinces;
use Illuminate\Http\Request;

class provinces_with_gender extends Controller
{
    public function provinces($center, $gender)
    {
        $provinces = Provinces::select('ostan')
            ->where('markaz', '=', $center)
            ->where('gender', '=', $gender)
            ->distinct()
            ->orderBy('ostan', 'asc')
            ->get();
        return response()->json($provinces);
    }
}
