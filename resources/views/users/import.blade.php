@extends('layouts.app')
@section('content')
<div class="container-flui p-5">
    <div class="row">
        <div class="col-12">
            <h1>Import Users</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="{{ route('users.import.post') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="form-group">
                    <label for="file">File</label>
                    <input type="file" name="file" id="file" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Importer</button>
            </form>
        </div>
    </div>
</div>
@endsection