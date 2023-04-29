<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Helli\Image;
use App\Models\User;
use App\Models\UserActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Jenssegers\Agent\Agent;
use Illuminate\Session\Store;
class GetPersonalImage extends Controller
{
    public function getPersonalImage($nationalcode , Request $request)
    {
        $id = DB::table('users')->where('national_code', $nationalcode)->value('personalImageSrc');
        if ($id) {
            $path = Image::find($id);
            $src = $path->src;
            if (!User::exists($path)) {
                abort(404);
            }
            $profileUrl = Storage::url($src);

            $sesion=session('nationalcode');
            $agent = new Agent();
            UserActivityLog::firstorcreate([
                'user_id' => session('national_code'),
                'activity' => 'Get Personal Image With This NationalCode => ' . $sesion,
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
                'device' => $agent->device(),
            ]);

            return response()->json(['imageSrc' => $profileUrl]);
        }
        return '';
    }
}
