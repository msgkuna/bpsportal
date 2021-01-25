@extends('anggaran::layouts.main')
@section('header')
@component('components.header')
@slot('title')
<i class="fas fa-id-card"></i> Manajemen SDM
@endslot
@slot('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
@endslot
@endcomponent
@endsection
@section('content')
    <div class="container">
        @include('partials.alert')
        <div class="card card-outline card-secondary">
            <div class="card-header">
                <h3 class="card-title">Dashboard</h3>
            </div>
            <div class="card-body table-responsive">
                This view is loaded from module: {!! config('anggaran.name') !!}
            </div>
        </div>
    </div>
@endsection
