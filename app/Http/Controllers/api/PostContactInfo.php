<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Helli\Contact;
use App\Models\User;
use App\Models\UserActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Jenssegers\Agent\Agent;

class PostContactInfo extends Controller
{
    public function postContact(Request $request, $token) {
        $nationalcode=User::where('remember_token',$token)->value('national_code');

        $phone = $request->input('contact.0.phone');
        $mobile = $request->input('contact.0.mobile');
        $address = $request->input('contact.0.address');
        $postal_code = $request->input('contact.0.postal_code');

        if (strlen($postal_code)!==10){
            return response()->json(['تعداد کاراکترهای کدپستی باید 10 رقمی باشد.'],422);
        }
        $contact = Contact::where('national_code', '=', $nationalcode)->update([
            'phone' => $phone,
            'mobile' => $mobile,
            'address' => $address,
            'postal_code' => $postal_code,
            'approved' => 1,
        ]);
        $agent = new Agent();
        UserActivityLog::create([
            'user_id' => session('user_id'),
            'activity' => 'Post Contact Info With This NationalCode => ' . $nationalcode,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'device' => $agent->device(),
        ]);
    }
}
