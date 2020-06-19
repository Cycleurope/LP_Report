@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Reports</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @if(count($reports))
            @else
            <div class="alert alert-primary">{{ __('No Report') }}</div>
            @endif
        </div>
    </div>
</div>
@endsection