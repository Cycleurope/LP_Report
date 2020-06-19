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
        $serials = Serial::paginate(50);
        return view('serials.index', [
            'serials' => $serials
        ]);
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
