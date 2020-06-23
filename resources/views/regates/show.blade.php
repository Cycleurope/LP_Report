@extends('layouts.app')
@section('content')
<div class="container-fluid p-5">
    <div class="row">
        <div class="col-12">
            <h1>{{ $regate->code }} - {{ $regate->name }}</h>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mb-4">
            <a href="{{ route('regates.reports.export', $regate->code) }}" class="btn btn-success btn-lg">Exporter les rapports pour cette régate</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card border-0">
                <div class="card-body">
                    @if(count($regate->reports))
                    <h2>Rapports associés</h2>
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Numéro de série</th>
                                <th>Code Article</th>
                                <th>Audit / Contrôle</th>
                                <th>Date Audit / Contrôle</th>
                                <th>Micro-fissure</th>
                                <th>Longueur (en mm))</th>
                                <th>Observations</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($regate->reports as $report)
                            <tr>
                                <td>{{ $report->serial->code }}</td>
                                <td>{{ $report->serial->product->code }}</td>
                                <td>{!! $report->friendlyType !!}</td>
                                <td>{{ $report->report_date }}</td>
                                <td>{!! $report->crackStatus() !!}</td>
                                <td>{{ $report->crack_length }}</td>
                                <td>{{ $report->observations }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class="alert alert-primary">Aucun rapport associé</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection