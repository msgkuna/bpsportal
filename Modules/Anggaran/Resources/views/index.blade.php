@extends('anggaran::layouts.main')
@section('header')
@component('components.header')
@slot('title')
<i class="fas fa-balance-scale"></i> Manajemen Anggaran
@endslot
@slot('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
@endslot
@endcomponent
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-4">
            @widget('Anggaran\RealisasiAnggaran')
        </div>
        <div class="col-4">
            @widget('Anggaran\RealisasiDukman')
        </div>
        <div class="col-4">
            @widget('Anggaran\RealisasiPpis')
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @widget('Anggaran\RealisasiGiat')
        </div>
    </div>
</div>
@endsection
