<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Helli\Contact;
use Illuminate\Http\Request;

class PostContactInfo extends Controller
{
    public function postContact(Request $request, $nationCode) {
        $phone = $request->input('contact.0.phone');
        $mobile = $request->input('contact.0.mobile');
        $address = $request->input('contact.0.address');
        $postal_code = $request->input('contact.0.postal_code');
        $contact = Contact::where('national_code', '=', $nationCode)->update([
            'phone' => $phone,
            'mobile' => $mobile,
            'address' => $address,
            'postal_code' => $postal_code,
            'approved' => 1,
        ]);
    }
}
