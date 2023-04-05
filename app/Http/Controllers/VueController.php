<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VueController extends Controller
{
    public function index()
    {
        $dataFromController = ['name' => 'John', 'age' => 30];
        return view('welcome', compact('dataFromController'));
    }
    public function recieve(Request $request)
    {
        $name = $request->input('name');
        return view('test', compact('name'));

        // do something with the data
    }
}
