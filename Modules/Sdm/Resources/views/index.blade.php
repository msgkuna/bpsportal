@extends('sdm::layouts.main')
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
    @component('components.card')
    @slot('header')
        Manajemen SDM
    @endslot
    @slot('body')
        This view is loaded from module: {!! config('sdm.name') !!}
    @endslot
    @endcomponent
</div>
@endsection
