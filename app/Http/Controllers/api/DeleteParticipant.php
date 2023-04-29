<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Helli\Participant;
use Illuminate\Http\Request;

class DeleteParticipant extends Controller
{
    public function deleteParticipant($id) {
        if ($id) {
            $participant_info=Participant::where('id', '=', $id)->delete();
        }
    }
}
