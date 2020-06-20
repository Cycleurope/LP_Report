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
            Instructions
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="card border-0">
                <div class="card-body">
                    <h3>Je n'ai qu'un seul rapport à envoyer</h3>
                    <form action="{{ route('reports.import.post') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="file">Regate</label>
                            <input type="text" name="file" id="file" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="file">Numéro de série</label>
                            <input type="text" name="file" id="file" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="file">Fissure</label>
                            <input type="text" name="file" id="file" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="file">Fichier</label>
                            <input type="text" name="file" id="file" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Importer</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card border-0">
                <div class="card-body">
                    <h3>J'ai plusieurs rapports à envoyer</h3>
                    <form action="{{ route('reports.import.post') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="file">Fichier</label>
                            <input type="file" name="file" id="file" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Importer</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12"><a href="{{ route('reports.index') }}">Retour</a></div>
    </div>
</div>
@endsection