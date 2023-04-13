<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class VueController extends Controller
{
    public function index()
    {
//        $client = new Client();
//        $response = $client->request('GET', 'http://ws.ismc.ir/api/WebService/Handler?username=AllamehHeli&password=F2Hr5U6QSh1C0UK%@&ParamsArray=[{"Keyword":"EduStatus","Params":[{"NationalCode":"1756195171"}]}]');
//        $data = json_decode($response->getBody(), true);
//        return view('index', $data['data']);
        return view('index');
    }
}
