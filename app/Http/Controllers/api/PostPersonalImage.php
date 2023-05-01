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
    public function postPersonalImage(Request $request, $token)
    {

        $file = $request->file('file');
        if ($file and $token) {
            $validator = Validator::make($request->file(), [
                'file' => 'required|image|mimes:jpeg,png,jpg,bmp|max:2048|dimensions:min_height=128,min_width=128,max_height=600,max_width=600',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors()->first());
            }
            $filename = $file->getClientOriginalName();
            $hashName = uniqid('', true) . '.' . $request->file('file')->getClientOriginalName();
            $path = $file->storeAs('public/profile_images', $hashName);


            $imageTable = Image::Create([
                'name' => $filename,
                'src' => $path,
            ]);

            if ($imageTable) {
                User::where('remember_token', '=', $token)->update([
                    'personalImageSrc' => $imageTable->id,
                ]);
            }

            $agent = new Agent();
            UserActivityLog::create([
                'user_id' => session('user_id'),
                'activity' => 'Post Personal Image For This NationalCode => ' . session('nationalcode'),
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
                'device' => $agent->device(),
            ]);

            return response()->json(['message' => 'فایل با موفقیت ارسال شد.']);
        }
    }
}
