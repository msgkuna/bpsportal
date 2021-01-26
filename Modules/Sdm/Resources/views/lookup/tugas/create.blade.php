@extends('sdm::layouts.main')
@section('header')
@component('components.header')
@slot('title')
Data Tugas
@endslot
@slot('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{  url('/sdm') }}">Manajemen SDM</a></li>
<li class="breadcrumb-item">Tambah Data Tugas</li>
@endslot
@endcomponent
@endsection
@section('content')
<div class="container-fluid">
    <div class="card card-outline card-secondary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data Tugas</h3>
            <div class="card-tools">
                <a class="btn btn-sm btn-success" href="{{ route('tugas.index') }}"> Kembali</a>
            </div>
        </div>
        <form action="{{ route('tugas.store') }}" method="POST">
            @csrf
            <input type="hidden" name="jabatan_id" value="3">
            <input type="hidden" name="tugas_id" id="tugas_id">
            <input type="hidden" name="uraian" id="uraian">
            <input type="hidden" name="tab" value="fungsional">
            <div class="card-body">
                <div class="form-group row">
                    <label for="fungsional_id" class="col-md-2 col-form-label text-md-right">Jabatan Fungsional :</label>
                    <div class="input-group col-md-10">
                        <select name="fungsional_id" id="fungsional_id" class="form-control" onChange="fungsional(this);" autofocus>
                            <option value="">Jabatan Fungsional</option>
                            @foreach ($fungsional as $row)
                                <option value="{{ $row->fungsional_id }}">{{ $row->uraian }}</option>
                            @endforeach
                        </select>
                        @error('fungsional_id')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jenjang_id" class="col-md-2 col-form-label text-md-right">Jenjang Jabatan :</label>
                    <div class="input-group col-md-10">
                        <select name="jenjang_id" id="jenjang_id" class="form-control" onChange="jenjang(this);" >
                            <option value="">Jenjang Jabatan</option>
                            @foreach ($jenjang as $row)
                                <option value="{{ $row->jenjang_id }}">{{ $row->uraian }}</option>
                            @endforeach
                        </select>
                        @error('jenjang_id')<span class="invalid-feedback"><strong>{{ $message }}</strong></span>@enderror
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
@section('scripts')
<script type="text/javascript">
var kode, uraian, x1, x2, y1, y2;
function fungsional(sel) {
    x1 = sel.value;
    y1 = sel.options[sel.selectedIndex].text;
}
function jenjang(sel) {
    x2 = sel.value;
    y2 = sel.options[sel.selectedIndex].text;
    gab_kode = '3'+x1+x2;
    gab_uraian = y1 + ' ' + y2;
    $("#tugas_id").val(gab_kode);
    $("#uraian").val(gab_uraian);
}
</script>
@endsection
