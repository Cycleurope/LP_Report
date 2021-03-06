<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Regate;

class RegateController extends Controller
{
    public function index()
    {
        $regates = Regate::orderBy('code', 'ASC')->get();
        $regates_count = Regate::all()->count();
        return view('regates.index', [
            'regates' => $regates,
            'regates_count' => $regates_count,
        ]);
    }

    public function show($code)
    {
        $regate = Regate::where('code', $code)->first();
        return view('regates.show', ['regate' => $regate]);
    }

    public function export($regate)
    {
        return redirect()->route('regates.show', $regate);
    }
}
