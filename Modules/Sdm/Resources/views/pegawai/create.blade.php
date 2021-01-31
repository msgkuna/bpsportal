@extends('sdm::layouts.main')
@section('header')
@component('components.header')
@slot('title')
<i class="fas fa-id-card"></i> Manajemen SDM
@endslot
@slot('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{  url('/sdm') }}">Manajemen SDM</a></li>
<li class="breadcrumb-item">Data Pegawai</li>
@endslot
@endcomponent
@endsection
@section('content')
<div class="container-fluid">
    <div class="card card-outline card-secondary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data Pegawai</h3>
            <div class="card-tools">
                <a class="btn btn-sm btn-success" href="{{ route('pegawai.index') }}"> Kembali</a>
            </div>
        </div>
        <form action="{{ route('pegawai.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="nip" class="col-md-2 col-form-label text-md-right">NIP :</label>
                    <div class="input-group col-md-2">
                      <input name="nip" type="text" class="form-control @error('nip') is-invalid @enderror" name="nip" value="{{ old('nip') }}" placeholder="NIP BPS" required autocomplete="nip" autofocus>
                      @error('nip')<span class="invalid-feedback"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                    <label for="nipbaru" class="col-md-1 col-form-label text-md-right">NIP Baru :</label>
                    <div class="input-group col-md-3">
                        <input name="nipbaru" type="text" class="form-control @error('nipbaru') is-invalid @enderror" name="nipbaru" value="{{ old('nipbaru') }}" placeholder="NIP Baru" required autocomplete="nipbaru">
                        @error('nipbaru')<span class="invalid-feedback"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                    <label for="nik" class="col-md-1 col-form-label text-md-right">NIK :</label>
                    <div class="input-group col-md-3">
                        <input name="nik" type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{ old('nik') }}" placeholder="NIK" autocomplete="nik">
                        @error('nik')<span class="invalid-feedback"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="gelar_depan" class="col-md-2 col-form-label text-md-right">Nama Lengkap :</label>
                    <div class="input-group col-md-2">
                        <input name="gelar_depan" type="text" class="form-control @error('gelar_depan') is-invalid @enderror" name="gelar_depan" value="{{ old('gelar_depan') }}" placeholder="Gelar Depan">
                        @error('gelar_depan')<span class="invalid-feedback"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                    <div class="input-group col-md-6">
                      <input name="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" placeholder="Nama" required autocomplete="nama">
                      @error('nama')<span class="invalid-feedback"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                    <div class="input-group col-md-2">
                        <input name="gelar_belakang" type="text" class="form-control @error('gelar_belakang') is-invalid @enderror" name="gelar_belakang" value="{{ old('gelar_belakang') }}" placeholder="Gelar Belakang">
                        @error('gelar_belakang')<span class="invalid-feedback"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="npwp" class="col-md-2 col-form-label text-md-right">NPWP :</label>
                    <div class="input-group col-md-3">
                        <input name="npwp" type="text" class="form-control @error('npwp') is-invalid @enderror" name="npwp" value="{{ old('npwp') }}" placeholder="NPWP">
                        @error('npwp')<span class="invalid-feedback"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                    <label for="email" class="col-md-1 col-form-label text-md-right">Email :</label>
                    <div class="input-group col-md-6">
                      <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email">
                      @error('email')<span class="invalid-feedback"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="kawin_id" class="col-md-2 col-form-label text-md-right">Status Perkawinan :</label>
                    <div class="input-group col-md-4">
                        <select name="kawin_id" class="form-control @error('kawin_id') is-invalid @enderror">
                            <option value="">Status Perkawinan</option>
                            @foreach ($kawin as $row)
                                <option value="{{ $row->kawin_id }}" {{ (request()->get('kawin_id') == $row->kawin_id) ? 'selected':'' }}>{{ $row->uraian }}</option>
                            @endforeach
                        </select>
                        @error('kawin_id')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                    <label for="agama_id" class="col-md-1 col-form-label text-md-right">Agama :</label>
                    <div class="input-group col-md-5">
                        <select name="agama_id" class="form-control @error('agama_id') is-invalid @enderror">
                            <option value="">Agama</option>
                            @foreach ($agama as $row)
                                <option value="{{ $row->agama_id }}" {{ request()->get('agama_id') == $row->agama_id ? 'selected':'' }}>{{ $row->uraian }}</option>
                            @endforeach
                        </select>
                        @error('agama_id')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="didik_id" class="col-md-2 col-form-label text-md-right">Jenjang Pendidikan :</label>
                    <div class="input-group col-md-4">
                        <select name="didik_id" class="form-control @error('didik_id') is-invalid @enderror">
                            <option value="">Pendidikan</option>
                            @foreach ($didik as $row)
                                <option value="{{ $row->didik_id }}" {{ request()->get('didik_id') == $row->didik_id ? 'selected':'' }}>{{ $row->uraian }}</option>
                            @endforeach
                        </select>
                        @error('didik_id')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                    <label for="pangkat_id" class="col-md-2 col-form-label text-md-right">Pangkat (Gol/Ruang) :</label>
                    <div class="input-group col-md-4">
                        <select name="pangkat_id" class="form-control @error('pangkat_id') is-invalid @enderror">
                            <option value="">Pangkat (Gol/Ruang)</option>
                            @foreach ($pangkat as $row)
                                <option value="{{ $row->pangkat_id }}" {{ request()->get('pangkat_id') == $row->pangkat_id ? 'selected':'' }}>{{ $row->uraian.' ('.$row->gol_ruang.')' }}</option>
                            @endforeach
                        </select>
                        @error('pangkat_id')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="jabatan_id" class="col-md-2 col-form-label text-md-right">Jabatan :</label>
                    <div class="input-group col-md-3">
                        <select name="jabatan_id" id="jabatan" class="form-control @error('jabatan_id') is-invalid @enderror">
                            <option value="">Jabatan</option>
                            @foreach ($jabatan as $row)
                                <option value="{{ $row->jabatan_id }}" {{ request()->get('jabatan_id') == $row->jabatan_id ? 'selected':'' }}>{{ $row->uraian }}</option>
                            @endforeach
                        </select>
                        @error('jabatan_id')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                    <label for="tugas_id" class="col-md-2 col-form-label text-md-right">Penugasan :</label>
                    <div class="input-group col-md-5">
                        <select name="tugas_id" id="tugas" class="form-control @error('tugas_id') is-invalid @enderror">
                            <option value="">Penugasan</option>
                        </select>
                        @error('tugas_id')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="satker_id" class="col-md-2 col-form-label text-md-right">Satuan Kerja :</label>
                    <div class="input-group col-md-5">
                        <select name="satker_id" class="form-control @error('satker_id') is-invalid @enderror">
                            <option value="">Satuan Kerja</option>
                            @foreach ($satker as $row)
                                <option value="{{ $row->satker_id }}" {{ request()->get('satker_id') == $row->satker_id ? 'selected':'' }}>{{ $row->uraian }}</option>
                            @endforeach
                        </select>
                        @error('satker_id')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                    <label for="status_id" class="col-md-2 col-form-label text-md-right">Status :</label>
                    <div class="input-group col-md-3">
                        <select name="status_id" class="form-control @error('status_id') is-invalid @enderror">
                            <option value="">Status</option>
                            @foreach ($status as $row)
                                <option value="{{ $row->status_id }}" {{ request()->get('status_id') == $row->status_id ? 'selected':'' }}>{{ $row->uraian }}</option>
                            @endforeach
                        </select>
                        @error('status_id')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="alamat" class="col-md-2 col-form-label text-md-right">Alamat Lengkap :</label>
                    <div class="input-group col-md-10">
                        <textarea rows="4" class="form-control @error('alamat') is-invalid @enderror" name="alamat" placeholder="Alamat">{{ old('alamat') }}</textarea>
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
@section('scripts')
    <script type="text/javascript">
        $(document).on('change','#jabatan', function() {
            $.ajax({
                url: "{{ route('pegawai.get_by_tugas') }}?jabatan_id=" + $(this).val(),
                method: 'GET',
                success: function(data) {
                    $('#tugas').html(data.html);
                }
            });
        });
    </script>
@endsection
