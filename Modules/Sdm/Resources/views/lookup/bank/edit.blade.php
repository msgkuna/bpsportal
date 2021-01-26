@extends('sdm::layouts.main')
@section('header')
@component('components.header')
@slot('title')
Data Transfer Bank
@endslot
@slot('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{  url('/sdm') }}">Manajemen SDM</a></li>
<li class="breadcrumb-item">Ubah Data Transfer Bank</li>
@endslot
@endcomponent
@endsection
@section('content')
<div class="container-fluid">
    <div class="card card-outline card-secondary">
        <div class="card-header">
            <h3 class="card-title">Ubah Data Transfer Bank</h3>
            <div class="card-tools">
                <a class="btn btn-sm btn-success" href="{{ route('bank.index') }}"> Kembali</a>
            </div>
        </div>
        <form action="{{ route('bank.update', $bank->bank_id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group row">
                    <label for="bank_id" class="col-md-1 col-form-label text-md-right">{{ __('Kode') }}</label>
                    <div class="input-group col-md-10">
                        <input id="bank_id" type="text" value="{{ $bank->bank_id }}" class="form-control-plaintext" name="bank_id" placeholder="Kode" readonly>
                        @error('bank_id')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="uraian" class="col-md-1 col-form-label text-md-right">{{ __('Uraian') }}</label>
                    <div class="input-group col-md-10">
                        <input id="uraian" type="text" value="{{ $bank->uraian }}" class="form-control @error('uraian') is-invalid @enderror" name="uraian" placeholder="Uraian" autocomplete="uraian" autofocus>
                        @error('uraian')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary"><i class="fas fa fa-save"></i> Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
