@extends('layouts.app')
@section('content')
<div class="container-fluid p-5">
    @role('admin')
    <div class="row">
        <div class="col-12">
            <h1>Rapports</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mb-4">
        <a href="{{ route('reports.export') }}" class="btn btn-success btn-lg">Exporter les rapports</a>
        </div>
        @role('admin')
        <div class="col-12">
            @if(count($reports))
            <div class="card border-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <h3>{{ $reports->count() }}</h3>
                            rapports enregistrés
                        </div>
                        <div class="col-4">
                            <h3>{{ $reports_ko->count() }}</h3>
                            {{ number_format($reports_ok->count()/$reports->count() * 100, 2) }} %
                        </div>
                        <div class="col-4">
                            <h3>{{ $reports_ok->count() }}</h3>
                            {{ number_format($reports_ko->count()/$reports->count() * 100, 2) }} %
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-0">
                <div class="card-body">
                    <table class="table table-sm table-hover" id="datatable">
                        <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Regate</th>
                                <th>&nbsp;</th>
                                <th>Audit / Contrôle</th>
                                <th>Date Audit / Contrôle</th>
                                <th>Fissure</th>
                                <th>Longueur (mm)</th>
                                <th>Déclaré par</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reports as $r)
                            <tr>
                                <td><a href="{{ route('serials.show', $r->serial->code) }}">{{ $r->serial->code }}</a></td>
                                <td>
                                    @if($r->regate)
                                    <a href="{{ route('regates.show', $r->regate->code) }}">{{ $r->regate->code }}</a>
                                    @endif
                                </td>
                                <td>
                                    @if($r->regate)
                                    <a href="{{ route('regates.show', $r->regate->code) }}">{{ $r->regate->name }}</a>
                                    @endif
                                </td>
                                <td>{!! $r->friendlyType() !!}</td>
                                <td>{{ date('d/m/Y', strtotime($r->report_date)) }}</td>
                                <td>{!! $r->crackStatus() !!}</td>
                                <td>{{ $r->crack_length }}</td>
                                <td>{{ $r->user->login }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @else
            <div class="alert alert-primary">Aucun rapport enregistré.</div>
            @endif
        </div>
        @endrole
    </div>
    @endrole
    @role('user')
    <div class="row">
        <div class="col-12">
            <h1>Mes rapports</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @if(count($reports))
            <div class="card border-0">
                <div class="card-body">
                    <table class="table table-sm table-hover">
                        <thead>
                            <tr>
                                <th>Numéro de série</th>
                                <th>Code REGATE</th>
                                <th>&nbsp;</th>
                                <th>Audit / Contrôle</th>
                                <th>Date Audit / Contrôle</th>
                                <th>Micro-fissure</th>
                                <th>Longueur (mm)</th>
                                <th>Déclaré par</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reports as $r)
                            <tr>
                                <td><a href="{{ route('serials.show', $r->serial->code) }}">{{ $r->serial->code }}</a></td>
                                <td>{{ $r->regate->code }}</td>
                                <td>{{ $r->regate->name }}</td>
                                <td>{!! $r->friendlyType() !!}</td>
                                <td>{{ date('d/m/Y', strtotime($r->report_date)) }}</td>
                                <td>{!! $r->crackStatus() !!}</td>
                                <td>{{ $r->crack_length }}</td>
                                <td>{{ $r->user->login }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @else
            <div class="alert alert-primary">Aucun rapport enregistré.</div>
            @endif
        </div>
    </div>
    @endrole
</div>
@endsection