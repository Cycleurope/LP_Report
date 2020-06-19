@extends('layouts.app')
@section('content')
<div class="container-fluid px-5">
    <div class="row">
        <div class="col-12">
            <h1>Regates</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @if(count($regates))
            <table class="table table-sm table-hover">
                <thead>
                    <tr>
                        <td>Code</td>
                        <td>Régate</td>
                        <td>Commande CEI</td>
                        <td>Commande Poste</td>
                        <td>Date fabrication</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($regates as $regate)
                    <tr>
                        <td>{{ $regate->code }}</td>
                        <td>{{ $regate->name }}</td>
                        <td>{{ $regate->address1 }}</td>
                        <td>{{ $regate->address2 }}</td>
                        <td>{{ $regate->city }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div class="alert alert-primary">{{ __('No Regates') }}</div>
            @endif
        </div>
    </div>
</div>
@endsection