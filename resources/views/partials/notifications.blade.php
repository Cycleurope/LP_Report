@if(Session::has('message'))
<div class="container">
    <div class="row">
        <div class="col px-5">
            <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message') }}</div>
        </div>
    </div>
</div>
@endif