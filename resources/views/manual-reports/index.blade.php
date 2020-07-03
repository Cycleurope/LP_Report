@extends('layouts.app')
@section('content')
<div class="container-fluid p-5">
    <div class="row py-5">
        <div class="col-12">
            <h1>Rapports Manuels</h1>
        </div>
    </div>
    <div class="row py-5">
        <div class="col-12">
            <form action="{{ route('manual-reports.bulk-delete') }}" method="POST">
            @csrf
            <table class="table table-striped" id="datatable">
                <thead>
                    <tr>
                        <th width="20">&nbsp;</th>
                        <th>N° Chassis</th>
                        <th>Code REGATE</th>
                        <th>CP / Ville Bureau</th>
                        <th>Audit / Contrôle</th>
                        <th>Date</th>
                        <th>Fissure</th>
                        <th>Longueur (mm)</th>
                        <th>Observations</th>
                        <th>Identifiant</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($manualreports as $mr)
                    <tr>
                        <th><input type="checkbox" name="mr[]" value="{{ $mr->id }}"></th>
                        <td>{{ $mr->serial }}</td>
                        <td>{{ $mr->regate }}</td>
                        <td>{{ $mr->postal_code }} {{ $mr->city }}</td>
                        <td>{{ $mr->type }}</td>
                        <td>{{ $mr->report_date }}</td>
                        <td>{{ $mr->crack }}</td>
                        <td>{{ $mr->crack_length }}</td>
                        <td>{{ $mr->observations }}</td>
                        <td>{{ $mr->user->login }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary mb-5">Supprimer les lignes sélectionnées</button>
            </form>
        </div>
    </div>
</div>
@endsection