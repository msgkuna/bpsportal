@extends('pengguna::layouts.main')
@section('header')
@component('components.header')
@slot('title')
Manajemen Pengguna
@endslot
@slot('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{ route('pengguna.index') }}">Manajemen Pengguna</a></li>
<li class="breadcrumb-item">Assign Permission</li>
@endslot
@endcomponent
@endsection
@section('content')
<div class="container">
    @include('partials.alert')
    <div class="card card-outline card-secondary">
        <div class="card-header">
            <h3 class="card-title">Assign Permission</h3>
            <div class="card-tools">
                <a class="btn btn-sm btn-success" href="{{ route('role.index') }}"> Kembali</a>
            </div>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-sm table-hover table-striped table-bordered">
                <tbody>
                    <tr>
                        <th scope="row" style="width:20%;">Role Name</th>
                        <td>{{ $role->name }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Description</th>
                        <td>{{ $role->description }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Guard</th>
                        <td>{{ $role->guard_name }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card-body table-responsive">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-outline card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Available</h3>
                            </div>
                            <form action="{{ route('role.add.permission') }}" method="post">
                            @csrf
                            <input type="hidden" name="role" value="{{ $role->name }}">
                            <div class="card-body table-responsive">
                                <div class="form-group">
                                    <select multiple size="10" name="permission[]" class="form-control list {{ $errors->has('permission') ? 'is-invalid':'' }}" required>
                                        @foreach ($permission as $row)
                                            <option value="{{ $row->name }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                @role('admin')
                                <button type="submit" class="btn btn-primary"><i class="fas fa fa-save"></i> Assign</button>
                                @endrole
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-outline card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Assigned</h3>
                            </div>
                            <form action="{{ route('role.remove.permission') }}" method="post">
                            @csrf
                            <input type="hidden" name="role" value="{{ $role->name }}">
                            <div class="card-body table-responsive">
                                <select multiple size="10" name="permission[]" class="form-control list {{ $errors->has('role') ? 'is-invalid':'' }}" required>
                                    @foreach ($role_permission as $row)
                                        <option value="{{ $row->name }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="card-footer">
                                @role('admin')
                                <button type="submit" class="btn btn-danger"><i class="fas fa fa-trash"></i> Revoke</button>
                                @endrole
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
