@extends('anggaran::layouts.main')
@section('header')
@component('components.header')
@slot('title')
<i class="fas fa-id-card"></i> Manajemen Anggaran
@endslot
@slot('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{ url('/anggaran') }}">Database</a></li>
<li class="breadcrumb-item">Data Detail Kegiatan</li>
@endslot
@endcomponent
@endsection
@section('content')
    <div class="container">
        @include('partials.alert')
        <div class="card card-outline card-secondary">
            <div class="card-header">
                <h3 class="card-title">Data Detail Kegiatan</h3>
                <div class="card-tools">
                    <a class="btn btn-sm btn-success" href="{{ route('item.upload') }}"> Upload Data</a>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover table-striped table-bordered table-sm table-valign-middle">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Program</th>
                            <th scope="col">Aktivitas</th>
                            <th scope="col">KRO</th>
                            <th scope="col">RO</th>
                            <th scope="col">Komponen</th>
                            <th scope="col">SubKomp</th>
                            <th scope="col">Akun</th>
                            <th scope="col">Detail</th>
                            <th scope="col">Vol Keg</th>
                            <th scope="col">Sat Keg</th>
                            <th scope="col">Harga Sat</th>
                            <th scope="col">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($ditem as $row)
                        <tr>
                            <td scope="row">{{ $row->kdprogram }}</td>
                            <td scope="row">{{ $row->kdgiat }}</td>
                            <td scope="row">{{ $row->kdoutput }}</td>
                            <td scope="row">{{ $row->kdsoutput }}</td>
                            <td scope="row">{{ $row->kdkmpnen }}</td>
                            <td scope="row">{{ $row->kdskmpnen }}</td>
                            <td scope="row">{{ $row->kdakun }}</td>
                            <td scope="row">{{ $row->noitem .'. '.$row->nmitem }}</td>
                            <td scope="row">{{ $row->volkeg }}</td>
                            <td scope="row">{{ $row->satkeg }}</td>
                            <td scope="row">{{ $row->hargasat }}</td>
                            <td scope="row">{{ $row->jumlah }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="12" scope="colgroup" class="text-center">Tidak ada data</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <div class="float-right d-none d-sm-inline">
                    Menampilkan {{$ditem->count()}} dari {{ $ditem->total() }} data.
                </div>
                {{ $ditem->links() }}
            </div>
        </div>
    </div>
@endsection
