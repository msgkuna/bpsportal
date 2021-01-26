@extends('sdm::layouts.main')
@section('header')
@component('components.header')
@slot('title')
Data Transfer Bank
@endslot
@slot('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{  url('/sdm') }}">Manajemen SDM</a></li>
<li class="breadcrumb-item">Tambah Data Transfer Bank</li>
@endslot
@endcomponent
@endsection
@section('content')
<div class="container-fluid">
    <div class="card card-outline card-secondary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data Transfer Bank</h3>
            <div class="card-tools">
                <a class="btn btn-sm btn-success" href="{{ route('bank.index') }}"> Kembali</a>
            </div>
        </div>
        <form action="{{ route('bank.store') }}" method="POST">
            @csrf

            <div class="card-body">
                <div class="form-group row">
                    <label for="bank_id" class="col-md-1 col-form-label text-md-right">{{ __('Kode') }}</label>
                    <div class="input-group col-md-10">
                        <input name="bank_id" type="text" value="{{ old('bank_id') }}" class="form-control @error('bank_id') is-invalid @enderror" placeholder="Kode" autofocus>
                        @error('bank_id')
                          <span class="invalid-feedback">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                </div>
                <div class="form-group row">
                    <label for="uraian" class="col-md-1 col-form-label text-md-right">{{ __('Uraian') }}</label>
                    <div class="input-group col-md-10">
                        <input name="uraian" type="text" value="{{ old('uraian') }}" class="form-control @error('uraian') is-invalid @enderror" placeholder="Nama Bank">
                        @error('uraian')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
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
