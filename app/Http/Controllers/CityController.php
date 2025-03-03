<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        //$cities = City::with('country')->get();
        //return view('city', compact('cities'));

        $cities = City::all();
        return view('city', ['cities' => $cities]);
    }
}
