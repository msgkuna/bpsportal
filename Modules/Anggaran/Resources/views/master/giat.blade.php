@extends('anggaran::layouts.main')
@section('header')
@component('components.header')
@slot('title')
<i class="fas fa-balance-scale"></i> Manajemen Anggaran
@endslot
@slot('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{ url('/anggaran') }}">Anggaran</a></li>
<li class="breadcrumb-item">Master Aktivitas</li>
@endslot
@endcomponent
@endsection
@section('content')
    <div class="container-fluid">
        @include('partials.alert')
        <div class="card card-outline card-secondary">
            <div class="card-header">
                <h3 class="card-title">Data Aktivitas</h3>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover table-striped table-bordered table-sm table-valign-middle">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" style="width:5%">K/L</th>
                            <th scope="col" style="width:5%">Es I</th>
                            <th scope="col" style="width:5%">Program</th>
                            <th scope="col" style="width:5%">Kode</th>
                            <th scope="col">Uraian</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($giat as $row)
                        <tr>
                            <td scope="row">{{ $row->kddept }}</td>
                            <td scope="row">{{ $row->kdunit }}</td>
                            <td scope="row">{{ $row->kdprogram }}</td>
                            <td scope="row">{{ $row->kdgiat }}</td>
                            <td scope="row">{{ $row->nmgiat }}</td>
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
                    Menampilkan {{$giat->count()}} dari {{ $giat->total() }} data.
                </div>
                {{ $giat->links() }}
            </div>
        </div>
    </div>
@endsection
