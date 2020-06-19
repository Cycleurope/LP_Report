<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::all();
        return view('reports.index', [
            'reports' => $reports
        ]);
    }

    public function importForm()
    {
        return view('reports.import');
    }

    public function import(Request $request)
    {
        return redirect()->route('reports.index');
    }

}
