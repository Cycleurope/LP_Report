@extends('layouts.app')
@section('content')
<div class="container-fluid p-5">
    <div class="row">
        <div class="col-12 mb-4">
            <h1>Codes REGATE</h1>
            <span>{{ $regates_count }} codes REGATE</span>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @if(count($regates))
            <div class="card border-0">
                <div class="card-body">
                    {{ $regates->links() }}
                    <table class="table table-sm table-hover" id="datatable">
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>Regate</th>
                                <th>Adresse 1</th>
                                <th>Adresse 2</th>
                                <th>Ville</th>
                                <th>Rapports</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($regates as $regate)
                            <tr>
                                <td>{{ $regate->code }}</td>
                                <td><a href="{{ route('regates.show', $regate->code) }}">{{ $regate->name }}</a></td>
                                <td>{{ $regate->address1 }}</td>
                                <td>{{ $regate->address2 }}</td>
                                <td>{{ $regate->city }}</td>
                                <td>{!! $regate->reportsCount() !!}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $regates->links() }}
                </div>
            </div>
            @else
            <div class="alert alert-primary">{{ __('No Regates') }}</div>
            @endif
        </div>
    </div>
</div>
@endsection