@extends('anggaran::layouts.main')
@section('header')
@component('components.header')
@slot('title')
<i class="fas fa-id-card"></i> Manajemen Anggaran
@endslot
@slot('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{ url('/anggaran') }}">Database</a></li>
<li class="breadcrumb-item">Data Komponen</li>
@endslot
@endcomponent
@endsection
@section('content')
<div class="container-fluid">
        @include('partials.alert')
        <div class="card card-outline card-secondary">
            <div class="card-header">
                <h3 class="card-title">Upload Data Komponen</h3>
                <div class="card-tools">
                    <a class="btn btn-sm btn-success" href="{{ route('kmpnen.index') }}"> Kembali</a>
                </div>
            </div>
            <div class="card-body table-responsive">
				<form action="{{ route('kmpnen.upload.post') }}" method="POST" enctype="multipart/form-data">
					{{ csrf_field() }}
                <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="file" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <input type="submit" value="Upload" class="input-group btn btn-primary">
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script src="{{ asset('/bower_components/admin-lte/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script>
    $(function () {
      bsCustomFileInput.init();
    });
</script>
@endsection
