@extends('pengguna::layouts.main')
@section('header')
@component('components.header')
@slot('title')
Manajemen Pengguna
@endslot
@slot('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{ route('pengguna.index') }}">Manajemen Pengguna</a></li>
<li class="breadcrumb-item">Tambah Data Pengguna</li>
@endslot
@endcomponent
@endsection
@section('content')
    <div class="container">
        @include('partials.alert')
        <div class="card card-outline card-secondary">
            <div class="card-header border-0">
                <h3 class="card-title">Daftar Data Pegawai</h3>
                <div class="card-tools">
                    <a class="btn btn-sm btn-success" href="{{ route('pengguna.index') }}"> Kembali</a>
                </div>
                <form action="{{ route('pengguna.create') }}" method="get">
                    @csrf
                    <div class="input-group input-group-sm col-md-4 float-right">
                      <input type="text" name="term" placeholder="Cari nama ..." value="{{ old('term') }}" class="form-control">
                      <span class="input-group-append">
                        <button type="submit" class="btn btn-info bg-gradient-*"><i class="fas fa-search"></i></button>
                      </span>
                    </div>
                </form>
            </div>
            <form action="{{ route('pengguna.store') }}" method="POST">
            @csrf
            <div class="card-body table-responsive p-0">
                <table class="table table-hover table-striped table-bordered table-sm table-valign-middle">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" style="width:5%;"><input type="checkbox" id="checkAll"></th>
                            <th scope="col" style="width:40%;">Nama Lengkap</th>
                            <th scope="col" style="width:20%;">Email</th>
                            <th scope="col">Satuan Kerja</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($pegawai as $row)
                        <tr>
                            <td><input type="checkbox" name="nip[]" class="checkbox" value="{{$row->nip}}" data-id="{{$row->nip}}"></td>
                            <td>{{ $row->nama }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ is_null($row->satker_id)?'':$row->satker->uraian }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" scope="colgroup" class="text-center">Tidak ada data</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if ($pegawai->count() > 0)
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-gradients-"><i class="fas fa fa-user-plus"></i> Tambah</button>
                </div>
            @endif
            </form>
            <div class="card-footer">
                <div class="float-right d-none d-sm-inline">
                    Menampilkan {{$pegawai->count()}} dari {{ $pegawai->total() }} data.
                </div>
                {{ $pegawai->links() }}
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script type="text/javascript">
    $('#checkAll').click(function () {
        $('input:checkbox').prop('checked', this.checked);
    });
</script>
@endsection
