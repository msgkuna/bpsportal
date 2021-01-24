@extends('sdm::layouts.main')
@section('header')
@component('components.header')
@slot('title')
Data Pegawai
@endslot
@slot('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{  url('/sdm') }}">Manajemen SDM</a></li>
<li class="breadcrumb-item">Ubah Data Pegawai</li>
@endslot
@endcomponent
@endsection
@section('content')
<div class="container">
    <div class="card card-outline card-secondary">
        <div class="card-header">
            <h3 class="card-title">Ubah Data Pegawai</h3>
            <div class="card-tools">
                <a class="btn btn-sm btn-primary" href="{{ route('pegawai.index') }}"> Kembali</a>
            </div>
        </div>
        <form action="{{ route('pegawai.update', $pegawai->nip) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group row">
                    <label for="nip" class="col-md-2 col-form-label text-md-right">{{ __('NIP') }}</label>
                    <div class="input-group col-md-2">
                        <input name="nip" type="text" class="form-control @error('nip') is-invalid @enderror" name="nip" value="{{ $pegawai->nip }}" placeholder="NIP BPS" readonly>
                        @error('nip')<span class="invalid-feedback"><strong>{{ $message }}</strong></span>@enderror
                    </div>

                    <label for="nipbaru" class="col-md-1 col-form-label text-md-right">{{ __('NIP Baru') }}</label>
                    <div class="input-group col-md-3">
                        <input name="nipbaru" type="text" class="form-control @error('nipbaru') is-invalid @enderror" name="nipbaru" value="{{ $pegawai->nipbaru }}" placeholder="NIP Baru" readonly>
                        @error('nipbaru')<span class="invalid-feedback"><strong>{{ $message }}</strong></span>@enderror
                    </div>

                    <label for="nik" class="col-md-1 col-form-label text-md-right">{{ __('NIK') }}</label>
                    <div class="input-group col-md-3">
                        <input name="nik" type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{ $pegawai->nik }}" placeholder="NIK" readonly>
                        @error('nik')<span class="invalid-feedback"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nama" class="col-md-2 col-form-label text-md-right">{{ __('Nama Lengkap') }}</label>
                    <div class="input-group col-md-2">
                        <input name="gelar_depan" type="text" class="form-control @error('gelar_depan') is-invalid @enderror" name="gelar_depan" value="{{ $pegawai->gelar_depan }}" placeholder="Gelar Depan">
                        @error('gelar_depan')<span class="invalid-feedback"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                    <div class="input-group col-md-6">
                        <input name="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ $pegawai->nama }}" placeholder="Nama">
                        @error('nama')<span class="invalid-feedback"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                    <div class="input-group col-md-2">
                        <input name="gelar_belakang" type="text" class="form-control @error('gelar_belakang') is-invalid @enderror" name="gelar_belakang" value="{{ $pegawai->gelar_belakang }}" placeholder="Gelar Belakang">
                        @error('gelar_belakang')<span class="invalid-feedback"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="npwp" class="col-md-2 col-form-label text-md-right">{{ __('NPWP') }}</label>
                    <div class="input-group col-md-3">
                        <input name="npwp" type="text" class="form-control @error('npwp') is-invalid @enderror" name="npwp" value="{{ $pegawai->npwp }}" placeholder="NPWP">
                        @error('npwp')<span class="invalid-feedback"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                    <label for="email" class="col-md-1 col-form-label text-md-right">{{ __('Email') }}</label>
                    <div class="input-group col-md-6">
                        <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $pegawai->email }}" placeholder="Email" readonly>
                        @error('email')<span class="invalid-feedback"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="kawin_id" class="col-md-2 col-form-label text-md-right">{{ __('Status Perkawinan') }}</label>
                    <div class="input-group col-md-4">
                        <select name="kawin_id" class="form-control @error('kawin_id') is-invalid @enderror">
                            <option value="">Status Perkawinan</option>
                            @foreach($kawin as $row)
                                @if($pegawai->kawin_id == $row->kawin_id)
                                    <option value="{{$row->kawin_id}}" selected="selected">{{$row->uraian}}</option>
                                @else
                                    <option value="{{$row->kawin_id}}">{{$row->uraian}}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('kawin_id')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                    <label for="agama_id" class="col-md-1 col-form-label text-md-right">{{ __('Agama') }}</label>
                    <div class="input-group col-md-5">
                        <select name="agama_id" class="form-control @error('agama_id') is-invalid @enderror">
                            <option value="">Agama</option>
                            @foreach ($agama as $row)
                                @if ($pegawai->agama_id == $row->agama_id)
                                    <option value="{{ $row->agama_id }}" selected="selected">{{ $row->uraian }}</option>
                                @else
                                    <option value="{{ $row->agama_id }}">{{ $row->uraian }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('agama_id')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="didik_id" class="col-md-2 col-form-label text-md-right">{{ __('Jenjang Pendidikan') }}</label>
                    <div class="input-group col-md-5">
                        <select name="didik_id" class="form-control @error('didik_id') is-invalid @enderror">
                            <option value="">Pendidikan</option>
                            @foreach ($didik as $row)
                                @if ($pegawai->didik_id == $row->didik_id)
                                    <option value="{{ $row->didik_id }}" selected="selected">{{ $row->uraian }}</option>
                                @else
                                    <option value="{{ $row->didik_id }}">{{ $row->uraian }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('didik_id')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                    <label for="pangkat_id" class="col-md-1 col-form-label text-md-right">{{ __('Pangkat') }}</label>
                    <div class="input-group col-md-4">
                        <select name="pangkat_id" class="form-control @error('pangkat_id') is-invalid @enderror">
                            <option value="">Pangkat</option>
                            @foreach ($pangkat as $row)
                                @if ($pegawai->pangkat_id == $row->pangkat_id)
                                    <option value="{{ $row->pangkat_id }}" selected="selected">{{ $row->gol_ruang }}-{{ $row->uraian }}</option>
                                @else
                                    <option value="{{ $row->pangkat_id }}">{{ $row->gol_ruang }}-{{ $row->uraian }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('pangkat_id')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="jabatan_id" class="col-md-2 col-form-label text-md-right">{{ __('Jabatan') }}</label>
                    <div class="input-group col-md-3">
                        <select name="jabatan_id" class="form-control @error('jabatan_id') is-invalid @enderror">
                            <option value="">Jabatan</option>
                            @foreach ($jabatan as $row)
                                @if ($pegawai->jabatan_id == $row->jabatan_id)
                                    <option value="{{ $row->jabatan_id }}" selected="selected">{{ $row->uraian }}</option>
                                @else
                                    <option value="{{ $row->jabatan_id }}">{{ $row->uraian }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('jabatan_id')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                    <label for="satker_id" class="col-md-2 col-form-label text-md-right">{{ __('Satuan Kerja') }}</label>
                    <div class="input-group col-md-5">
                        <select name="satker_id" class="form-control @error('satker_id') is-invalid @enderror">
                            <option value="">Satuan Kerja</option>
                            @foreach ($satker as $row)
                                @if ($pegawai->satker_id == $row->satker_id)
                                    <option value="{{ $row->satker_id }}" selected="selected">{{ $row->uraian }}</option>
                                @else
                                    <option value="{{ $row->satker_id }}">{{ $row->uraian }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('satker_id')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="alamat" class="col-md-2 col-form-label text-md-right">{{ __('Alamat') }}</label>
                    <div class="input-group col-md-10">
                        <textarea rows="4" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" placeholder="Alamat">{{ $pegawai->alamat }}</textarea>
                        @error('alamat')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary"><i class="far fa fa-save"></i> Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
