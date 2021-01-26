@extends('sdm::layouts.main')
@section('header')
@component('components.header')
@slot('title')
Data Tugas
@endslot
@slot('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{  url('/sdm') }}">Manajemen SDM</a></li>
<li class="breadcrumb-item">Daftar Data Tugas</li>
@endslot
@endcomponent
@endsection
@section('content')
<div class="container-fluid">
    @include('partials.alert')
    <div class="card card-outline card-secondary">
        <div class="card-header">
            <ul class="nav nav-pills" id="jabatan-tab" role="tablist">
                <li class="nav-item">
                    <a  class="nav-link active"
                        class="nav-link {{ (Route::currentRouteName() == 'pimpinan') ? 'active' : '' }}"
                        id="pimpinan-tab"
                        data-toggle="tab"
                        href="#pimpinan"
                        role="tab"
                        aria-controls="pimpinan"
                        aria-selected="{{ (Route::currentRouteName() == 'pimpinan') ? 'true' : 'false' }}">
                        Pimpinan Tinggi
                    </a>
                </li>
                <li class="nav-item">
                    <a  class="nav-link {{ (Route::currentRouteName() == 'administrator') ? 'active' : '' }}"
                        id="administrator-tab"
                        data-toggle="tab"
                        href="#administrator"
                        role="tab"
                        aria-controls="administrator"
                        aria-selected="{{ (Route::currentRouteName() == 'administrator') ? 'true' : 'false' }}">
                        Administrator
                    </a>
                </li>
                <li class="nav-item">
                    <a  class="nav-link {{ (Route::currentRouteName() == 'fungsional') ? 'active' : '' }}"
                        id="fungsional-tab"
                        data-toggle="tab"
                        href="#fungsional"
                        role="tab"
                        aria-controls="fungsional"
                        aria-selected="{{ (Route::currentRouteName() == 'fungsional') ? 'true' : 'false' }}">
                        Fungsional
                    </a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="jabatan-tabContent">
                <div class="tab-pane fade show active"
                    class="tab-pane fade {{ (Route::currentRouteName() == 'pimpinan') ? 'show active' : '' }}"
                    id="pimpinan"
                    role="tabpanel"
                    aria-labelledby="pimpinan-tab">
                    <div class="card card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Jabatan Pimpinan Tinggi</h3>
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
                                    @foreach ($pimpinan as $row)
                                    <tr>
                                        <td style="text-align:center">{{ $row->tugas_id }}</td>
                                        <td>{{ $row->uraian }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <div class="float-right d-none d-sm-inline">
                                Displaying {{$pimpinan->count()}} of {{ $pimpinan->total() }} data.
                            </div>
                            {{ $pimpinan->fragment('pimpinan')->links() }}
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade {{ (Route::currentRouteName() == 'administrator') ? 'show active' : '' }}" id="administrator" role="tabpanel" aria-labelledby="administrator-tab">
                    <div class="card card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Jabatan Administrator</h3>
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
                                    @foreach ($administrator as $row)
                                    <tr>
                                        <td style="text-align:center">{{ $row->tugas_id }}</td>
                                        <td>{{ $row->uraian }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <div class="float-right d-none d-sm-inline">
                                Displaying {{$administrator->count()}} of {{ $administrator->total() }} data.
                            </div>
                            {{ $administrator->fragment('administrator')->links() }}
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade {{ (Route::currentRouteName() == 'fungsional') ? 'show active' : '' }}"  id="fungsional" role="tabpanel" aria-labelledby="fungsional-tab">
                    <div class="card card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Jabatan Fungsional</h3>
                            <div class="card-tools">
                                <a class="btn btn-sm btn-success" href="{{ route('tugas.create') }}"> Tambah Data</a>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover table-striped table-bordered table-sm table-valign-middle">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col" style="width:10%;text-align:center;">Kode</th>
                                        <th scope="col">Uraian</th>
                                        <th scope="col" style="width:5%;text-align:center;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($fungsional as $row)
                                    <tr>
                                        <td style="text-align:center">{{ $row->tugas_id }}</td>
                                        <td>{{ $row->uraian }}</td>
                                        <td style="text-align:center;">
                                            <form action="{{ route('tugas.destroy', ['jabatan' => $row->jabatan_id, 'tugas'=>$row->tugas_id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Yakin mau menghapus data {{ $row->uraian }} ?')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <div class="float-right d-none d-sm-inline">
                                Menampilkan {{$fungsional->count()}} dari {{ $fungsional->total() }} data.
                            </div>
                            {{ $fungsional->fragment('fungsional')->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
//redirect to specific tab
$(document).ready(function () {
$('#jabatan-tab a[href="#{{ old('tab') }}"]').tab('show')
});
</script>
@endsection
