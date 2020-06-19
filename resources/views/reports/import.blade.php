@extends('layouts.app')
@section('content')
<div class="container-fluid p-5">
    <div class="row">
        <div class="col-12">
            <h1>Importer des rapports</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="{{ route('reports.import.post') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="form-group">
                    <label for="file">Fichier</label>
                    <input type="file" name="file" id="file" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Importer</button>
            </form>
        </div>
        <div class="col-12"><a href="{{ route('reports.index') }}">Retour</a></div>
    </div>
</div>
@endsection