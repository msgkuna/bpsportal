@extends('sdm::layouts.main')
@section('header')
@component('components.header')
@slot('title')
Data Pegawai
@endslot
@slot('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{  url('/sdm') }}">Manajemen SDM</a></li>
<li class="breadcrumb-item">Detail Data Pegawai</li>
@endslot
@endcomponent
@endsection
@section('content')
    <div class="container">
        <div class="card card-outline card-secondary">
            <div class="card-header border-0">
                <h3 class="card-title">Detail Data Pegawai</h3>
                <div class="card-tools">
                    <a class="btn btn-sm btn-primary" href="{{ route('pegawai.index') }}"> Kembali</a>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-sm table-hover table-striped table-bordered">
                    <tbody>
                        <tr>
                            <th scope="row" style="width:25%;">NIP</th>
                            <td>{{ $pegawai->nip }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Nama</th>
                            <td>{{ $pegawai->nama }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
