@extends('sdm::layouts.main')
@section('header')
@component('components.header')
@slot('title')
Data Transfer Bank
@endslot
@slot('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{  url('/sdm') }}">Manajemen SDM</a></li>
<li class="breadcrumb-item">Daftar Data Transfer Bank</li>
@endslot
@endcomponent
@endsection
@section('content')
<div class="container-fluid">
    @include('partials.alert')
    <div class="card card-outline card-secondary">
        <div class="card-header border-0">
            <h3 class="card-title">Daftar Data Transfer Bank</h3>
            <div class="card-tools">
                <a class="btn btn-sm btn-success" href="{{ route('bank.create') }}"> Tambah Data</a>
            </div>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover table-striped table-bordered table-sm table-valign-middle">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" style="width:10%;text-align:center;">Kode</th>
                        <th scope="col">Nama Bank</th>
                        <th scope="col" style="width:10%;text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($bank as $row)
                    <tr>
                        <th scope="row" style="text-align:center;">{{ $row->bank_id }}</th>
                        <td>{{ $row->uraian }}</td>
                        <td style="text-align:center;">
                            <form action="{{ route('bank.destroy',$row->bank_id) }}" method="POST">
                                <a class="btn btn-sm btn-primary" href="{{ route('bank.edit',$row->bank_id) }}"><i class="fas fa-edit"></i></a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Yakin mau menghapus data {{ $row->uraian }} ?')" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
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
                Menampilkan {{$bank->count()}} dari {{ $bank->total() }} data.
            </div>
            {{ $bank->links() }}
        </div>
    </div>
</div>
@endsection
