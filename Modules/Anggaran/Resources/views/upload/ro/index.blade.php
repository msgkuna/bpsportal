@extends('anggaran::layouts.main')
@section('header')
@component('components.header')
@slot('title')
<i class="fas fa-id-card"></i> Manajemen Anggaran
@endslot
@slot('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{ url('/anggaran') }}">Database</a></li>
<li class="breadcrumb-item">Data Rincian Output</li>
@endslot
@endcomponent
@endsection
@section('content')
    <div class="container">
        @include('partials.alert')
        <div class="card card-outline card-secondary">
            <div class="card-header">
                <h3 class="card-title">Data Rincian Output</h3>
                <div class="card-tools">
                    <a class="btn btn-sm btn-success" href="{{ route('ro.upload') }}"> Upload Data</a>
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
                            <th scope="col">Uraian</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dro as $row)
                        <tr>
                            <td scope="row">{{ $row->kdprogram }}</td>
                            <td scope="row">{{ $row->kdgiat }}</td>
                            <td scope="row">{{ $row->kdoutput }}</td>
                            <td scope="row">{{ $row->kdsoutput }}</td>
                            <td scope="row">{{ $row->ursoutput }}</td>
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
                    Menampilkan {{$dro->count()}} dari {{ $dro->total() }} data.
                </div>
                {{ $dro->links() }}
            </div>
        </div>
    </div>
@endsection
