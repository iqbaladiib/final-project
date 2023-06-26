@extends('layouts-dash.template')

@section('content')     
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
@if (session('error'))
<div class="alert alert-error" role="alert">
    {{ session('error') }}
</div>
@endif
                <!-- Content -->
                <div class="container-fluid">
                    <h1>Selamat Datang,</h1>
                </div>
@endsection        