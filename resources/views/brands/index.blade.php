@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Brands</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @if(count($brands))
            @else
            <div class="alert alert-primary">{{ __('No Brand') }}</div>
            @endif
        </div>
    </div>
</div>
@endsection