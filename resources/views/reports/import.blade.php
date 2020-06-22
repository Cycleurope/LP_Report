@extends('layouts.app')
@section('content')
<div class="container p-5">
    @include('partials.notifications')
    <div class="row">
        <div class="col-12 mb-4">
            <h1>Envoyer des rapports</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="row">
                <div class="col-12">
                    <h3>Je n'ai qu'un seul rapport à envoyer</h3>
                </div>
                <div class="col-12">
                    <div class="card border-0">
                        <div class="card-body">
                            <form action="{{ route('reports.store') }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="regate">Code REGATE</label>
                                        <input type="number" name="regate" id="regate" class="form-control text-center">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="serial">Numéro de série</label>
                                        <input type="number" name="serial" id="serial" class="form-control text-center">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="report_date">Type de rapport</label>
                                        <select name="type" id="type" class="form-control">
                                            <option value="audit">Audit</option>
                                            <option value="checkup">Contrôle</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="report_date">Date Audit / Contrôle</label>
                                        <input type="date" name="report_date" id="report_date" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-4">
                                        <label for="report_date">Micro-fissure</label>
                                        <select name="crack" id="crack" class="form-control">
                                            <option value="0">Non</option>
                                            <option value="1">Oui</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-8">
                                        <label for="report_date">Longueur (en mm)</label>
                                        <input type="number" name="crack_length" id="crack_length" class="form-control text-center" value="0">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="report_date">Observations</label>
                                    <textarea name="observations" id="observations" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Importer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="row">
                <div class="col-12">
                    <h3>J'ai plusieurs rapports à envoyer</h3>
                </div>
                <div class="col-12">
                    <div class="card border-0">
                        <div class="card-body">
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
            </div>
        </div>
        <div class="col-12"><a href="{{ route('reports.index') }}" class="btn btn-secondary">Retour</a></div>
    </div>
</div>
@endsection