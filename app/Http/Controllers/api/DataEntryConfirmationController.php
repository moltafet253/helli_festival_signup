<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Helli\DataEntryConfirmation;
use Illuminate\Http\Request;

class DataEntryConfirmationController extends Controller
{
    public function getDataEntryConfirmation()
    {
        $check = DataEntryConfirmation::where('user_id', session('user_id'))->first();
        if (!empty($check) and $check->status == 1) {
            return true;
        }
        return false;
    }

    public function confirmDataEntry(Request $request)
    {
        if ($request->approved == 1) {
            $dataEntry = DataEntryConfirmation::where('user_id', session('user_id'))->first();
            $dataEntry->status = 1;
            $dataEntry->save();
        }
    }
}
