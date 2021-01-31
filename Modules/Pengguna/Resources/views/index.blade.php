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
<div class="container-fluid">
    <div class="row">
        <div class="col-9">
            @widget('Users\UserLastLogin')
            {{-- @widget('\App\Http\Widgets\Users', $config)
            {{ Widget::userLastLogin() }} --}}
        </div>
        <div class="col-3">
            @widget('Users\UserRegistration')
            {{-- {{ Widget::userRegistration() }} --}}
        </div>
    </div>
</div>
@endsection
