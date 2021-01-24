@extends('pengguna::layouts.main')
@section('header')
@component('components.header')
@slot('title')
<i class="fas fa-users"></i> Manajemen Pengguna
@endslot
@slot('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
@endslot
@endcomponent
@endsection
@section('content')
<div class="container">
    @component('components.card')
    @slot('header')
        Manajemen Pengguna
    @endslot
    @slot('body')
        This view is loaded from module: {!! config('pengguna.name') !!}
    @endslot
    @endcomponent
</div>
@endsection
