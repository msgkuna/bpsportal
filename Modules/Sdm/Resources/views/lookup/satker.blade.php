@extends('sdm::layouts.main')
@section('header')
@component('components.header')
@slot('title')
Data Satuan Kerja
@endslot
@slot('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{  url('/sdm') }}">Manajemen SDM</a></li>
<li class="breadcrumb-item">Daftar Data Satuan Kerja</li>
@endslot
@endcomponent
@endsection
@section('content')
<div class="container-fluid">
    <div class="card card-outline card-secondary">
        <div class="card-header border-0">
            <h3 class="card-title">Daftar Data Satuan Kerja</h3>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover table-striped table-bordered table-sm table-valign-middle">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" style="width:15%;">Kode Satker</th>
                        <th scope="col">Uraian</th>
                        <th scope="col" style="width:10%;">Eselon</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($satker as $row)
                    <tr>
                        <th scope="row">{{ $row->satker_id }}</th>
                        <td>{{ $row->uraian }}</td>
                        <td>{{ $row->eselon }}</td>
                    </tr>
                    @endforeach
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
