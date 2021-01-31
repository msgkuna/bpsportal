@extends('sdm::layouts.main')
@section('header')
@component('components.header')
@slot('title')
<i class="fas fa-id-card"></i> Manajemen SDM
@endslot
@slot('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{  url('/sdm') }}">Manajemen SDM</a></li>
<li class="breadcrumb-item">Jenjang Jabatan Fungsional</li>
@endslot
@endcomponent
@endsection
@section('content')
<div class="container-fluid">
    <div class="card card-outline card-secondary">
        <div class="card-header border-0">
            <h3 class="card-title">Jenjang Jabatan Fungsional</h3>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover table-striped table-bordered table-sm table-valign-middle">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" style="width:10%;text-align:center;">Kode</th>
                        <th scope="col">Uraian</th>
                        <th scope="col">Pangkat Terendah</th>
                        <th scope="col">Pangkat Tertinggi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jenjang as $row)
                    <tr>
                        <th scope="row">{{ $row->jenjang_id }}</th>
                        <td>{{ $row->uraian }}</td>
                        <td>{{ $row->pangkat_rendah->uraian .' ('.$row->pangkat_rendah->gol_ruang.')' }}</td>
                        <td>{{ $row->pangkat_tinggi->uraian .' ('.$row->pangkat_tinggi->gol_ruang.')'}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <div class="float-right d-none d-sm-inline">
                Displaying {{$jenjang->count()}} of {{ $jenjang->total() }} data.
            </div>
            {{ $jenjang->links() }}
        </div>
    </div>
</div>
@endsection
