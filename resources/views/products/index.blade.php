@extends('layouts.app')
@section('content')
<div class="container-fluid p-5">
    <div class="row">
        <div class="col-12">
            <h1>Products</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @if(count($products))
            <table class="table table-sm table-hover">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $p)
                    <tr>
                        <td>{{ $p->code }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div class="alert alert-primary">{{ __('No Products') }}</div>
            @endif
        </div>
    </div>
</div>
@endsection