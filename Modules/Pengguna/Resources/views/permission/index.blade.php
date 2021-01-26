@extends('pengguna::layouts.main')
@section('links')
@endsection
@section('header')
@component('components.header')
@slot('title')
Manajemen Pengguna
@endslot
@slot('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{ route('index') }}">Manajemen Pengguna</a></li>
<li class="breadcrumb-item">Manajemen Permission</li>
@endslot
@endcomponent
@endsection
@section('content')
<div class="container-fluid">
    @include('partials.alert')
    <div class="row">
        <div class="col-md-4">
            <div class="card card-outline card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Tambah Permission</h3>
                </div>
                <form action="{{ route('permission.store') }}" method="POST">
                    @csrf

                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Permission</label>
                            <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" placeholder="Permission Name" id="name" autofocus required>
                            @error('name')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Description</label>
                            <textarea type="text" name="description" class="form-control" id="description">{{ old('description') }}</textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"><i class="fas fa fa-save"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card card-outline card-secondary">
                <div class="card-header border-0">
                    <h3 class="card-title">Daftar Permission</h3>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover table-striped table-bordered table-sm table-valign-middle">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col" style="width:5%;text-align:center;">#</th>
                                <th scope="col" style="width:20%;">Permission</th>
                                <th scope="col">Description</th>
                                <th scope="col" style="width:10%;">Guard</th>
                                <th scope="col" style="width:5%;text-align:center;">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @forelse ($role as $row)
                            <tr>
                                <td style="text-align:right;">{{ $no++ }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->description }}</td>
                                <td>{{ $row->guard_name }}</td>
                                <td style="text-align:center;">
                                    <form action="{{ route('permission.destroy', $row->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" onclick="return confirm('Yakin mau menghapus permission: {{ $row->name }} ini? Karena akan berpengaruh ke role yang terkait')" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada data</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="float-right d-none d-sm-inline">
                        Menampilkan {{$role->count()}} dari {{ $role->total() }} data.
                    </div>
                    {{ $role->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
