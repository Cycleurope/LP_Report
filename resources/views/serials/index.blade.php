@extends('layouts.app')
@section('content')
<div class="container-fluid px-5 py-5">
    <div class="row">
        <div class="col-12">
            <h1>Serials</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @if(count($serials))
            <div class="card border-0">
                <div class="card-body">
                    {{ $serials->links() }}
                    <table class="table table-sm table-hover">
                        <thead>
                            <tr>
                                <td>No Série</td>
                                <td>Régate</td>
                                <td>Commande CEI</td>
                                <td>Commande Poste</td>
                                <td>Date fabrication</td>
                                <td>Code Prooduit</td>
                                <td>Rapport</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($serials as $serial)
                            <tr>
                                <td>{{ $serial->code }}</td>
                                <td>{{ $serial->regate->code }} <small>({{$serial->regate->name}})</small></td>
                                <td>{{ $serial->cei_order }}</td>
                                <td>{{ $serial->poste_order }}</td>
                                <td>{{ date('d/m/Y', strtotime($serial->manufactured_at)) }}</td>
                                <td>{{ $serial->product->code }}</td>
                                <td>
                                    @if( count($serial->reports) )
                                    <span class="text-primary"><a href="{{ route('serials.show', $serial->code) }}">Consulter les rapports</a></span>
                                    @else
                                    <span class="text-danger">Aucun rapport</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $serials->links() }}
                </div>
            </div>
            @else
            <div class="alert alert-primary">{{ __('No Serial') }}</div>
            @endif
        </div>
    </div>
</div>
@endsection