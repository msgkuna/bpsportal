@extends('layouts.main')
@section('header')
    @component('components.header')
        @slot('title')
            Dashboard
        @endslot
        @slot('breadcrumb')
        @endslot
    @endcomponent
@endsection
@section('content')
    <div class="container">
        <div class="card card-outline card-secondary">
            <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle table-sm">
                    <tbody>
                        <tr>
                            <th width="25%" scope="row">Nama Lengkap</th>
                            <td>
                            @php
                                $depan = isset($user->pegawai->gelar_depan) ? $user->pegawai->gelar_depan . ' ' : '';
                                $belakang = !empty($user->pegawai->gelar_belakang)? ', ' . $user->pegawai->gelar_belakang : '';
                                $namalengkap = $depan . $user->pegawai->nama . $belakang;
                            @endphp
                                {{ $namalengkap }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Akun</th>
                            <td>
                            @php
                                echo explode('@',$user->pegawai->email)[0];
                            @endphp
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">NIP</th>
                            <td>{{ $user->pegawai->nip }}</td>
                        </tr>
                        <tr>
                            <th scope="row">NIP Baru</th>
                            <td>{{ $user->pegawai->nipbaru }}</td>
                        </tr>
                        <tr>
                            <th scope="row">NIK</th>
                            <td>{{ $user->pegawai->nik }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Email</th>
                            <td>{{ $user->pegawai->email }}</td>
                        </tr>
                        <tr>
                            <th scope="row">NPWP</th>
                            <td>{{ $user->pegawai->npwp }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Tanggal Lahir</th>
                            <td>
                                @php
                                    echo \Carbon\Carbon::parse($user->pegawai->tanggal_lahir)->locale('id')->isoFormat('LL');
                                @endphp
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Umur</th>
                            <td>
                                {{Carbon\Carbon::parse($user->pegawai->tanggal_lahir)->age }}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">TMT CPNS</th>
                            <td>
                                @php
                                    echo \Carbon\Carbon::parse($user->pegawai->tmt_cpns)->locale('id')->isoFormat('LL');
                                @endphp
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Jenis Kelamin</th>
                            @php
                                $jeniskelamin = array('1'=>'Laki-laki', '2'=>'Perempuan');
                            @endphp
                            <td>{{ $jeniskelamin[$user->pegawai->jenis_kelamin] }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Status Perkawinan</th>
                            <td>{{ $user->pegawai->kawin->uraian }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Agama</th>
                            <td>{{ $user->pegawai->agama->uraian }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Pendidikan</th>
                            <td>{{ $user->pegawai->didik->uraian }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Pangkat</th>
                            <td>{{ $user->pegawai->pangkat->gol_ruang }} - {{ $user->pegawai->pangkat->uraian }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Jabatan</th>
                            <td>{{ $user->pegawai->tugas->uraian }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Satuan Kerja</th>
                            <td>{{ $user->pegawai->satker->uraian }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Alamat</th>
                            <td>{{ $user->pegawai->alamat }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
