<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Regate;

class RegateController extends Controller
{
    public function index()
    {
        $regates = Regate::all();
        return view('regates.index', [
            'regates' => $regates
        ]);
    }
}
