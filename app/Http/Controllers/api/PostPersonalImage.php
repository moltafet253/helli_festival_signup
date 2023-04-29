<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Helli\Image;
use App\Models\User;
use App\Models\UserActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Jenssegers\Agent\Agent;

class PostPersonalImage extends Controller
{
    public function postPersonalImage(Request $request, $nationCode)
    {
        $file = $request->file('file');
        if ($file and $nationCode) {
            $validator = Validator::make($request->all(), [
                'file' => 'required|image|mimes:jpeg,png,jpg,bmp|max:2048|dimensions:min_width=128,min_height=128',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $filename = $file->getClientOriginalName();
            $hashName = uniqid('', true) . '.' . $request->file('file')->getClientOriginalName();
            $path = $file->storeAs('public/profile_images', $hashName);


            $imageTable = Image::Create([
                'name' => $filename,
                'src' => $path,
            ]);

            if ($imageTable) {
                User::where('national_code', '=', $nationCode)->update([
                    'personalImageSrc' => $imageTable->id,
                ]);
            }

            $agent = new Agent();
            UserActivityLog::firstorcreate([
                'user_id' => session()->get('nationalcode'),
                'activity' => 'Post Personal Image With This NationalCode => ' . $nationCode,
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
                'device' => $agent->device(),
            ]);

            return response()->json(['message' => 'فایل با موفقیت ارسال شد.']);
        }
    }
}
