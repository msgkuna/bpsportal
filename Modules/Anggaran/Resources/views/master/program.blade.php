@extends('anggaran::layouts.main')
@section('header')
@component('components.header')
@slot('title')
<i class="fas fa-balance-scale"></i> Manajemen Anggaran
@endslot
@slot('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{ url('/anggaran') }}">Anggaran</a></li>
<li class="breadcrumb-item">Master Program</li>
@endslot
@endcomponent
@endsection
@section('content')
    <div class="container-fluid">
        @include('partials.alert')
        <div class="card card-outline card-secondary">
            <div class="card-header">
                <h3 class="card-title">Data Program</h3>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover table-striped table-bordered table-sm table-valign-middle">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" style="width:5%;">K/L</th>
                            <th scope="col" style="width:5%;">Es I</th>
                            <th scope="col" style="width:5%;">Kode</th>
                            <th scope="col">Uraian Program</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($program as $row)
                        <tr>
                            <td scope="row">{{ $row->kddept }}</td>
                            <td scope="row">{{ $row->kdunit }}</td>
                            <td scope="row">{{ $row->kdprogram }}</td>
                            <td scope="row">{{ $row->nmprogram }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" scope="colgroup" class="text-center">Tidak ada data</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <div class="float-right d-none d-sm-inline">
                    Menampilkan {{$program->count()}} dari {{ $program->total() }} data.
                </div>
                {{ $program->links() }}
            </div>
        </div>
    </div>
@endsection
