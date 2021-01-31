@extends('pengguna::layouts.main')
@section('header')
@component('components.header')
@slot('title')
<i class="fas fa-users"></i> Manajemen Pengguna
@endslot
@slot('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{ route('pengguna') }}">Manajemen Pengguna</a></li>
<li class="breadcrumb-item"><a href="{{ route('user.index') }}">Data User</a></li>
<li class="breadcrumb-item">Role Assign</li>
@endslot
@endcomponent
@endsection
@section('content')
<div class="container-fluid">
    @include('partials.alert')
    <div class="card card-outline card-secondary">
        <div class="card-header">
            <h3 class="card-title">Role Assign</h3>
            <div class="card-tools">
                <a class="btn btn-sm btn-success" href="{{ route('user.index') }}"> Kembali</a>
            </div>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-sm table-hover table-striped table-bordered">
                <tbody>
                    <tr>
                        <th scope="row" style="width:20%;">Nama</th>
                        <td>{{ $pengguna->pegawai->nama }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Akun</th>
                        <td>{{ $pengguna->username }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Status</th>
                        <td>
                            @if ($pengguna->flag)
                            <label class="badge badge-success">Aktif</label>
                            @else
                            <label class="badge badge-warning">Suspend</label>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card-body table-responsive">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-outline card-secondary">
                            <div class="card-header"><h3 class="card-title">Available</h3></div>
                            <form action="{{ route('user.assign.role') }}" method="post">
                            @csrf
                            <input type="hidden" name="nip" value="{{ $pengguna->nip }}">
                            <div class="card-body table-responsive">
                                <select multiple size="10" name="role[]" class="form-control list {{ $errors->has('role') ? 'is-invalid':'' }}" required>
                                    @foreach ($role as $row)
                                        <option value="{{ $row->name }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary"><i class="fas fa fa-save"></i> Assign</button>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-outline card-secondary">
                            <div class="card-header"><h3 class="card-title">Assigned</h3></div>
                            <form action="{{ route('user.revoke.role') }}" method="post">
                            @csrf
                            <input type="hidden" name="nip" value="{{ $pengguna->nip }}">
                            <div class="card-body table-responsive">
                                <select multiple size="10" name="role[]" class="form-control list {{ $errors->has('role') ? 'is-invalid':'' }}" required>
                                    @foreach ($pengguna->getRoleNames() as $role)
                                        <option value="{{ $role }}">{{ $role }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-danger"><i class="fas fa fa-trash"></i> Revoke</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
