@extends('sdm::layouts.main')
@section('header')
@component('components.header')
@slot('title')
<i class="fas fa-id-card"></i> Manajemen SDM
@endslot
@slot('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{  url('/sdm') }}">Manajemen SDM</a></li>
<li class="breadcrumb-item">Data Tugas</li>
@endslot
@endcomponent
@endsection
@section('content')
<div class="container-fluid">
    <div class="card card-outline card-secondary">
        <div class="card-header">
            <h3 class="card-title">Ubah Data Tugas</h3>
            <div class="card-tools">
                <a class="btn btn-sm btn-success" href="{{ route('tugas.index') }}"> Kembali</a>
            </div>
        </div>
        <form action="{{ route('tugas.store') }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="jabatan_id" value="{{$tugasmodel->jabatan_id}}" >
            <div class="card-body">
                <div class="form-group row">
                    <label for="jabatan_id" class="col-md-2 col-form-label text-md-right">Jabatan :</label>
                    <div class="input-group col-md-10">
                        <input name="jabatan_uraian" type="text" value="{{ $tugasmodel->jabatan_id .' '.$tugasmodel->jabatan->uraian }}" class="form-control-plaintext">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tugas_id" class="col-md-2 col-form-label text-md-right">Kode :</label>
                    <div class="input-group col-md-10">
                        <input name="tugas_id" id="tugas_id" type="text" value="{{ $tugasmodel->tugas_id }}" class="form-control-plaintext">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="uraian" class="col-md-2 col-form-label text-md-right">Uraian Tugas :</label>
                    <div class="input-group col-md-10">
                        <input name="uraian" type="text" value="{{ $tugasmodel->uraian }}" class="form-control @error('uraian') is-invalid @enderror" placeholder="Uraian Tugas" autocomplete="uraian" autofocus>
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
