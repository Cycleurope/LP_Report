<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use App\Regate;
use App\Serial;
use App\Imports\ReportsImport;
use App\Exports\ReportsExport;
use Maatwebsite\Excel\Facades\Excel;
use Auth;

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

    public function store(Request $request)
    {
        $regate = null;
        $serial = null;
        if(Regate::where('code', trim($request->regate))->exists()) {
            $regate = Regate::where('code', trim($request->regate))->first();
        }

        if(Serial::where('code', trim($request->serial))->exists()) {
            $serial = Serial::where('code', trim($request->serial))->first();
        }

        if($regate != null && $serial != null) {
            $report = Report::create([
                'serial_id' => $serial->id,
                'user_id' => Auth::user()->id,
                'regate_id' => $regate->id,
                'observations' => $request->observations,
                'crack' => $request->crack,
                'crack_length' => $request->crack_length,
                'report_date' => $request->report_date,
                'type' => $request->type
            ]);
        }

        return redirect()->route('reports.import.form')
            ->with('message', 'Le rapport a bien été enregistré.')
            ->with('class', 'success');
    }

    public function import(Request $request)
    {
        Excel::import(new ReportsImport, $request->file);
        return redirect()->route('reports.index');
    }

    public function export()
    {
        return Excel::download(new ReportsExport, 'reports.xlsx');
    }

}
