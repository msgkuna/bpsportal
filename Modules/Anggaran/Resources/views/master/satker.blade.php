@extends('anggaran::layouts.main')
@section('header')
@component('components.header')
@slot('title')
<i class="fas fa-balance-scale"></i> Manajemen Anggaran
@endslot
@slot('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{ url('/anggaran') }}">Anggaran</a></li>
<li class="breadcrumb-item">Master Satuan Kerja BPS</li>
@endslot
@endcomponent
@endsection
@section('content')
    <div class="container-fluid">
        @include('partials.alert')
        <div class="card card-outline card-secondary">
            <div class="card-header">
                <h3 class="card-title">Data Satuan Kerja BPS</h3>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover table-striped table-bordered table-sm table-valign-middle">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" style="width:5%">Satker</th>
                            <th scope="col">Nama</th>
                            <th scope="col" style="width:5%">K/L</th>
                            <th scope="col" style="width:5%">Es I</th>
                            <th scope="col" style="width:5%">Lokasi</th>
                            <th scope="col" style="width:5%">Kab/Kota</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($satker as $row)
                        <tr>
                            <td scope="row">{{ $row->kdsatker }}</td>
                            <td scope="row">{{ $row->nmsatker }}</td>
                            <td scope="row">{{ $row->kddept }}</td>
                            <td scope="row">{{ $row->kdunit }}</td>
                            <td scope="row">{{ $row->kdlokasi }}</td>
                            <td scope="row">{{ $row->kdkabkota }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" scope="colgroup" class="text-center">Tidak ada data</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <div class="float-right d-none d-sm-inline">
                    Menampilkan {{$satker->count()}} dari {{ $satker->total() }} data.
                </div>
                {{ $satker->links() }}
            </div>
        </div>
    </div>
@endsection
