@extends('anggaran::layouts.main')
@section('header')
@component('components.header')
@slot('title')
<i class="fas fa-balance-scale"></i> Manajemen Anggaran
@endslot
@slot('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{ url('/anggaran') }}">Anggaran</a></li>
<li class="breadcrumb-item">Data Detail Kegiatan</li>
@endslot
@endcomponent
@endsection
@section('content')
    <div class="container-fluid">
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
                            <th scope="col" style="width:5%">Prog</th>
                            <th scope="col" style="width:4%">Akt</th>
                            <th scope="col" style="width:4%">KRO</th>
                            <th scope="col" style="width:4%">RO</th>
                            <th scope="col" style="width:4%">Komp</th>
                            <th scope="col" style="width:4%">Sub</th>
                            <th scope="col" style="width:5%">Akun</th>
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
                            <td scope="row" style="text-align:right">{{ $row->volkeg }}</td>
                            <td scope="row">{{ $row->satkeg }}</td>
                            <td scope="row" style="text-align:right">{{ $row->hargasat }}</td>
                            <td scope="row" style="text-align:right">{{ $row->jumlah }}</td>
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
