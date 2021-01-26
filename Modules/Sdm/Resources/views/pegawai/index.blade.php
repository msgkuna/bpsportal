@extends('sdm::layouts.main')
@section('header')
@component('components.header')
@slot('title')
Data Pegawai
@endslot
@slot('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{  url('/sdm') }}">Manajemen SDM</a></li>
<li class="breadcrumb-item">Daftar Data Pegawai</li>
@endslot
@endcomponent
@endsection
@section('content')
<div class="container-fluid">
    @include('partials.alert')
        <div class="card card-outline card-secondary">
            <div class="card-header border-0">
                <h3 class="card-title">Daftar Data Pegawai</h3>
                <div class="card-tools">
                    <a class="btn btn-sm btn-success" href="{{ route('pegawai.create') }}"><i class="fas fa-user-plus"></i> Tambah Data</a>
                </div>
                <form action="{{ route('pegawai.index') }}" method="get">
                    @csrf
                    <div class="input-group input-group-sm col-md-4 float-right">
                      <input type="text" name="term" placeholder="Cari nama ..." value="{{ old('term') }}" class="form-control">
                      <span class="input-group-append">
                        <button type="submit" class="btn btn-info bg-gradient-*"><i class="fas fa-search"></i></button>
                      </span>
                    </div>
                </form>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover table-striped table-bordered table-sm table-valign-middle">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" style="width:10%;text-align:center;">NIP</th>
                            <th scope="col">Nama Lengkap</th>
                            <th scope="col">Jabatan</th>
                            <th scope="col">Satuan Kerja</th>
                            <th scope="col" style="width:13%;text-align:center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pegawai as $row)
                        <tr>
                            <td scope="row" style="text-align:center;">{{ $row->nip }}</td>
                            <td>
                                @php
                                    $depan = isset($row->gelar_depan) ? $row->gelar_depan . ' ' : '';
                                    $belakang = !empty($row->gelar_belakang)? ', ' . $row->gelar_belakang : '';
                                    $namalengkap = $depan . $row->nama . $belakang;
                                @endphp
                                {{ $namalengkap }}
                            </td>
                            <td>{{ is_null($row->tugas_id)?'':$row->tugas->uraian }}</td>
                            <td>{{ is_null($row->satker_id)?'':$row->satker->uraian }}</td>
                            <td style="text-align:center;">
                                <form action="{{ route('pegawai.destroy',$row->nip) }}" method="POST">
                                    <a class="btn btn-sm btn-info" href="{{ route('pegawai.show',$row->nip) }}"><i class="fas fa-eye"></i></a>
                                    <a class="btn btn-sm btn-primary" href="{{ route('pegawai.edit',$row->nip) }}"><i class="fas fa-edit"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Yakin mau menghapus data {{ $row->nama }} ?')" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" scope="colgroup" class="text-center">Tidak ada data</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <div class="float-right d-none d-sm-inline">
                    Menampilkan {{$pegawai->count()}} dari {{ $pegawai->total() }} data.
                </div>
                {{ $pegawai->links() }}
            </div>
        </div>
    </div>
@endsection
