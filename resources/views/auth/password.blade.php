@extends('layouts.main')
@section('header')
    @component('components.header')
        @slot('title')
            Dashboard
        @endslot
        @slot('breadcrumb')
        @endslot
    @endcomponent
@endsection
@section('content')
@include('partials.alert')
<div class="container-fluid">
    <div class="card card-outline card-secondary">
        <div class="card-header">
            <h3 class="card-title"><i class="nav-icon fas fa-user-lock"></i> Ganti Password</h3>
        </div>
        <form method="POST" action="{{ route('password.update') }}">
            @method('patch')
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="current_password">{{ __('Password Saat Ini') }}</label>
                    <div class="input-group">
                        <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" required autocomplete="current_password">
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-lock"></span></div>
                        </div>
                        @error('current_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">{{ __('Password Baru') }}</label>
                    <div class="input-group">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-lock"></span></div>
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="password-confirm">{{ __('Konfirmasi Password Baru') }}</label>
                    <div class="input-group">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-lock"></span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection
