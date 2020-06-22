<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Serial;
use App\Imports\SerialsImport;
use Maatwebsite\Excel\Facades\Excel;

class SerialController extends Controller
{
    public function index()
    {
        $serials = Serial::orderBy('code', 'DESC')->paginate(50);
        $serials_count = Serial::all()->count();
        return view('serials.index', [
            'serials' => $serials,
            'serials_count' => $serials_count
        ]);
    }

    public function show($serial)
    {
        $serial = Serial::where('code', $serial)->first();
        return view('serials.show', ['serial' => $serial]);
    }

    public function importForm()
    {
        return view('serials.import');
    }

    public function import(Request $request)
    {
        Excel::import(new SerialsImport, $request->file);
        return redirect()->route('serials.index');
    }
}
