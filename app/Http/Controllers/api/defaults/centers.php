<?php

namespace App\Http\Controllers\api\defaults;

use App\Http\Controllers\Controller;
use App\Models\Helli\Provinces;
use Illuminate\Http\Request;

class centers extends Controller
{
    public function centers($gender) {
        $centers = Provinces::select('markaz')
            ->where('gender', '=', $gender)
            ->distinct()
            ->orderBy('markaz', 'asc')
            ->get();
        return response()->json($centers);
    }
}
