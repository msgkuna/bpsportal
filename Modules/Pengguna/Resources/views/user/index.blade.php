@extends('pengguna::layouts.main')
@section('links')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
@endsection
@section('header')
@component('components.header')
@slot('title')
<i class="fas fa-users"></i> Manajemen Pengguna
@endslot
@slot('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{ route('pengguna') }}">Manajemen Pengguna</a></li>
<li class="breadcrumb-item">Data User</li>
@endslot
@endcomponent
@endsection
@section('content')
<div class="container-fluid">
    @include('partials.alert')
        <div class="card card-outline card-secondary">
            <div class="card-header border-0">
                <h3 class="card-title">Daftar Data User</h3>
                @can('add-user', Model::class)
                <div class="card-tools">
                    <a class="btn btn-sm btn-success" href="{{ route('user.create') }}"><i class="fas fa-user-plus"></i> Tambah Pengguna</a>
                </div>
                @endcan
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover table-striped table-bordered table-sm table-valign-middle">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" style="width:10%;">NIP</th>
                            <th scope="col">Nama Lengkap</th>
                            <th scope="col">Akun</th>
                            <th scope="col" style="width:10%;text-align:center;">Status</th>
                            <th scope="col" style="width:10%;text-align:center;">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($pengguna as $row)
                        <tr>
                            <td scope="row">{{ $row->nip }}</td>
                            <td>{{ $row->pegawai->nama }}</td>
                            <td>{{ $row->username }}</td>
                            <td style="text-align:center;"><input type="checkbox" data-id="{{ $row->nip }}" name="status" class="js-switch" {{ $row->flag == '1' ? 'checked' : '' }}></td>
                            <td style="text-align:center;">

                                <form action="{{ route('user.destroy', $row->nip) }}" method="POST">
                                    @can('add-user-role', Model::class)
                                    <a class="btn btn-sm bg-gradient-success" title="Role Assign" href="{{ route('user.show', $row->nip) }}"><i class="fas fa-user-tag"></i></a>
                                    @endcan
                                    @can('delete-user', Model::class)
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="Hapus data pengguna" onclick="return confirm('Yakin mau menghapus data {{ $row->pegawai->nama }} ?')" class="btn btn-sm bg-gradient-danger"><i class="fas fa-trash-alt"></i></button>
                                    @endcan
                                </form>
                            </td>
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
                    Menampilkan {{$pengguna->count()}} dari {{ $pengguna->total() }} data.
                </div>
                {{ $pengguna->links() }}
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script type="text/javascript">
    let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
    elems.forEach(function(html) {
        let switchery = new Switchery(html,  { size: 'small' });
    });

    $(document).ready(function(){
        $('.js-switch').change(function () {
            let status = $(this).prop('checked') === true ? '1' : '0';
            let userId = $(this).data('id');
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "{{route('user.update.status')}}",
                data: {'flag': status, 'nip': userId},
                success: function (data) {
                    console.log(data.message);
                }
            });
        });
    });
</script>
@endsection
