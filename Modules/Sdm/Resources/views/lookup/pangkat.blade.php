@extends('sdm::layouts.main')
@section('header')
@component('components.header')
@slot('title')
Data Jenjang Kepangkatan
@endslot
@slot('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{  url('/sdm') }}">Manajemen SDM</a></li>
<li class="breadcrumb-item">Daftar Data Jenjang Kepangkatan</li>
@endslot
@endcomponent
@endsection
@section('content')
<div class="container">
    <div class="card card-outline card-secondary">
        <div class="card-header">
            <h3 class="card-title">Daftar Data Jenjang Kepangkatan</h3>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover table-striped table-bordered table-sm table-valign-middle">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" style="width:10%;">Kode</th>
                        <th scope="col" style="width:10%;">Gol/Ruang</th>
                        <th scope="col">Uraian</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pangkat as $row)
                    <tr>
                        <th scope="row">{{ $row->pangkat_id }}</th>
                        <td>{{ $row->gol_ruang }}</td>
                        <td>{{ $row->uraian }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <div class="float-right d-none d-sm-inline">
                Menampilkan {{$pangkat->count()}} dari {{ $pangkat->total() }} data.
            </div>
            {{ $pangkat->links() }}
        </div>
    </div>
</div>
@endsection
