@extends('anggaran::layouts.main')
@section('header')
@component('components.header')
@slot('title')
<i class="fas fa-id-card"></i> Manajemen Anggaran
@endslot
@slot('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{ url('/anggaran') }}">Database</a></li>
<li class="breadcrumb-item">Data Sub Komponen</li>
@endslot
@endcomponent
@endsection
@section('content')
    <div class="container">
        @include('partials.alert')
        <div class="card card-outline card-secondary">
            <div class="card-header">
                <h3 class="card-title">Data Sub Komponen</h3>
                <div class="card-tools">
                    <a class="btn btn-sm btn-success" href="{{ route('skmpnen.upload') }}"> Upload Data</a>
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
                            <th scope="col">Uraian</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dskmpnen as $row)
                        <tr>
                            <td scope="row">{{ $row->kdprogram }}</td>
                            <td scope="row">{{ $row->kdgiat }}</td>
                            <td scope="row">{{ $row->kdoutput }}</td>
                            <td scope="row">{{ $row->kdsoutput }}</td>
                            <td scope="row">{{ $row->kdkmpnen }}</td>
                            <td scope="row">{{ $row->kdskmpnen }}</td>
                            <td scope="row">{{ $row->urskmpnen }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" scope="colgroup" class="text-center">Tidak ada data</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <div class="float-right d-none d-sm-inline">
                    Menampilkan {{$dskmpnen->count()}} dari {{ $dskmpnen->total() }} data.
                </div>
                {{ $dskmpnen->links() }}
            </div>
        </div>
    </div>
@endsection