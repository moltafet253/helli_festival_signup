<?php

namespace App\Http\Controllers\api\defaults;

use App\Http\Controllers\Controller;
use App\Models\Helli\SpecialSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class special_sections extends Controller
{
    public function specialSections()
    {
        $special_sections = SpecialSection::get()->where('active', '=', 1);
        return $special_sections;
    }
}
