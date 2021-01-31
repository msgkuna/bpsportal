@extends('anggaran::layouts.main')
@section('header')
@component('components.header')
@slot('title')
<i class="fas fa-balance-scale"></i> Manajemen Anggaran
@endslot
@slot('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{ url('/anggaran') }}">Anggaran</a></li>
<li class="breadcrumb-item">Master Eselon I</li>
@endslot
@endcomponent
@endsection
@section('content')
    <div class="container-fluid">
        @include('partials.alert')
        <div class="card card-outline card-secondary">
            <div class="card-header">
                <h3 class="card-title">Data Eselon I</h3>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover table-striped table-bordered table-sm table-valign-middle">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" style="width:5%">K/L</th>
                            <th scope="col" style="width:5%">Kode</th>
                            <th scope="col">Nama Unit Eselon I</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($unit as $row)
                        <tr>
                            <td scope="row">{{ $row->kddept }}</td>
                            <td scope="row">{{ $row->kdunit }}</td>
                            <td scope="row">{{ $row->nmunit }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" scope="colgroup" class="text-center">Tidak ada data</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <div class="float-right d-none d-sm-inline">
                    Menampilkan {{$unit->count()}} dari {{ $unit->total() }} data.
                </div>
                {{ $unit->links() }}
            </div>
        </div>
    </div>
@endsection
