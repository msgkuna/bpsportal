@extends('sdm::layouts.main')
@section('header')
@component('components.header')
@slot('title')
<i class="fas fa-id-card"></i> Manajemen SDM
@endslot
@slot('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{  url('/sdm') }}">Manajemen SDM</a></li>
<li class="breadcrumb-item">Status Perkawinan</li>
@endslot
@endcomponent
@endsection
@section('content')
<div class="container-fluid">
    <div class="card card-outline card-secondary">
        <div class="card-header border-0">
            <h3 class="card-title">Status Perkawinan</h3>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover table-striped table-bordered table-sm table-valign-middle">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" style="width:10%;text-align:center;">Kode</th>
                        <th scope="col">Uraian</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kawin as $row)
                    <tr>
                        <th scope="row">{{ $row->kawin_id }}</th>
                        <td>{{ $row->uraian }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <div class="float-right d-none d-sm-inline">
                Menampilkan {{$kawin->count()}} dari {{ $kawin->total() }} data.
            </div>
            {{ $kawin->links() }}
        </div>
    </div>
</div>
@endsection
