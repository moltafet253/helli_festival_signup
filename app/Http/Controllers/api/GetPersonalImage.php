<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Helli\Image;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class GetPersonalImage extends Controller
{
    public function getPersonalImage($nationalcode)
    {
        $id = DB::table('users')->where('national_code', $nationalcode)->value('personalImageSrc');
        if ($id) {
            $path = Image::find($id);
            $src = $path->src;
            if (!User::exists($path)) {
                abort(404);
            }
            $profileUrl = Storage::url($src);
            return response()->json(['imageSrc' => $profileUrl]);
        }
        return '';
    }
}
