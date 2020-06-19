<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use App\Imports\ReportsImport;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::all();
        $reports_ok = Report::where('crack', 0)->get();
        $reports_ko = Report::where('crack', 1)->get();
        return view('reports.index', [
            'reports' => $reports,
            'reports_ok' => $reports_ok,
            'reports_ko' => $reports_ko
        ]);
    }

    public function importForm()
    {
        return view('reports.import');
    }

    public function import(Request $request)
    {
        Excel::import(new ReportsImport, $request->file);
        return redirect()->route('reports.index');
    }

}
