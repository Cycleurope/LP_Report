@extends('layouts.app')
@section('content')
<div class="container-fluid px-5 py-5">
    <div class="row">
        <div class="col-12 mb-4">
            <h1>Numéros de série Unregistered</h1>
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
                                <th>No Série</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($serials as $serial)
                            <tr class="{{ count($serial->reports) ? "table-light text-secondary" : "" }}">
                                <td>{{ $serial->code }}</td>
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