@extends('layouts.app')
@section('content')
<div class="container-fluid px-5 py-5">
    <div class="row">
        <div class="col-12">
            <h1>{{ $serial->code }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-0">
                <div class="card-body">
                    <table class="table table-sm">
                        <tbody>
                            <tr>
                                <th>Commande CEI</th>
                                <td>{{ $serial->cei_order }}</td>
                            </tr>
                            <tr>
                                <th>Commande LaPoste</th>
                                <td>{{ $serial->poste_order }}</td>
                            </tr>
                            <tr>
                                <th>Régate</th>
                                <td>{{ $serial->regate->code }} - {{ $serial->regate->name }}</td>
                            </tr>
                            <tr>
                                <th>Date de fabrication</th>
                                <td>{{ $serial->manufactured_at }}</td>
                            </tr>
                            <tr>
                                <th>Code Article</th>
                                <td>{{ $serial->product->code }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-12">
            <h2>Rapports</h2>
        </div>
        <div class="col-12">
            <div class="card border-0">
                <div class="card-body">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Code Régate</th>
                                <th>&nbsp;</th>
                                <th>A/C</th>
                                <th>Date A/C</th>
                                <th>Fissure</th>
                                <th>Longueur Fissure</th>
                                <th>Observations</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($serial->reports as $report)
                            <tr>
                                <td>{{ $report->regate->code }}</td>
                                <td><a href="{{ route('regates.show', $report->regate->code) }}">{{ $report->regate->name }}</a></td>
                                <td>{{ $report->type }}</td>
                                <td>{{ $report->report_date }}</td>
                                <td>{!! $report->crackStatus() !!}</td>
                                <td>{{ $report->crack_length }}</td>
                                <td>{{ $report->observations }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection