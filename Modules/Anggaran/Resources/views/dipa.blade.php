@extends('anggaran::layouts.main')
@section('header')
@component('components.header')
@slot('title')
<i class="fas fa-balance-scale"></i> Manajemen Anggaran
@endslot
@slot('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{ route('anggaran') }}">Anggaran</a></li>
<li class="breadcrumb-item">DIPA Online</li>
@endslot
@endcomponent
@endsection
@section('content')
    <div class="container-fluid">
        <div class="card card-outline card-secondary">
            <div class="card-header">
                <h3 class="card-title">Rincian Kertas Kerja Satker T.A. {{ $kro->thang }}</h3>
                <div class="card-tools">
                    <form action="" method="get">
                        @csrf
                        <div class="input-group input-group-sm float-right">
                          <input type="text" name="term" placeholder="Cari detail kegiatan ..." value="{{ old('term') }}" class="form-control">
                          <span class="input-group-append">
                            <button type="submit" class="btn btn-info bg-gradient-*"><i class="fas fa-search"></i></button>
                          </span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover table-striped table-sm table-valign-middle">
                    <tbody>
                        <tr>
                            <td style="width:20%">Kementerian/Lembaga</td>
                            <td style="width:10%">({{ $kro->kddept }})</td>
                            <td>{{ $kro->mdept->nmdept }}</td>
                        </tr>
                        <tr>
                            <td style="width:20%">Unit Organisasi</td>
                            <td style="width:10%">({{ $kro->kdunit }})</td>
                            <td>{{ $kro->munit->nmunit }}</td>
                        </tr>
                        <tr>
                            <td style="width:20%">Unit Kerja</td>
                            <td style="width:10%">({{ $kro->kdsatker }})</td>
                            <td>{{ $kro->msatker->nmsatker }}</td>
                        </tr>
                        <tr>
                            <td style="width:20%">Alokasi</td>
                            <td colspan="2">Rp. {{ number_format($ditem->jumlah,0,',','.') }}</td>
                        </tr>
                    </tbody>
                </table>
                <br/>
                <table class="table table-hover table-striped table-bordered table-sm table-valign-middle">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" rowspan="2" style="width:10%;text-align:center">Kode</th>
                            <th scope="col" rowspan="2" style="text-align:center">Program/Aktivitas/Klasifikasi Rincian Output/Rincian Output/Komponen/Sub Komponen/Detil</th>
                            <th scope="col" colspan="3" style="text-align:center">Perhitungan Tahun {{ $kro->thang }}</th>
                        </tr>
                        <tr>
                            <th scope="col" style="width:10%;text-align:center">Volume</th>
                            <th scope="col" style="text-align:center">Harga Satuan</th>
                            <th scope="col" style="text-align:center">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- foreach Program --}}
                        @foreach ($prog as $rprog)
                            <tr>
                                <td>{{ $rprog->kddept.'.'.$rprog->kdunit.'.'.$rprog->kdprogram }}</td>
                                <td>{{ $rprog->nmprogram }}</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td style="text-align:right">{{ number_format($rprog->item->sum('jumlah'),0,',','.') }}</td>
                            </tr>
                            {{-- foreach Kegiatan --}}
                            @foreach ($rprog->giat as $rgiat)
                                <tr style="color: blue;">
                                    <td>{{ $rgiat->kdgiat }}</td>
                                    <td>{{ $rgiat->nmgiat }}</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td style="text-align:right">{{ number_format($rgiat->item->sum('jumlah'),0,',','.') }}</td>
                                </tr>
                                {{-- foreach Klasifikasi Rincian Output --}}
                                @foreach ($rgiat->kro as $rkro)
                                    <tr style="color: red;">
                                        <td>{{ $rkro->kdgiat.'.'.$rkro->kdoutput }}</td>
                                        <td>{{ $rkro->mkro->nmoutput }}</td>
                                        <td>{{ number_format($rkro->vol,0,',','.').' '.$rkro->mkro->jnsoutput }}</td>
                                        <td>&nbsp;</td>
                                        <td style="text-align:right">{{ number_format($rkro->item->sum('jumlah'),0,',','.') }}</td>
                                    </tr>
                                    {{-- foreach Rincian Output --}}
                                    @foreach ($rkro->ro as $rro)
                                        <tr style="font-weight: bold;">
                                            <td>{{ $rro->kdgiat.'.'.$rro->kdoutput.'.'.$rro->kdsoutput }}</td>
                                            <td>{{ $rro->ursoutput }}</td>
                                            <td>{{ number_format($rro->volsout,0,',','.').' '.$rro->mro->jnssoutput }}</td>
                                            <td>&nbsp;</td>
                                            <td style="text-align:right">{{ number_format($rro->item->sum('jumlah'),0,',','.') }}</td>
                                        </tr>
                                        {{-- foreach Komponen --}}
                                        @foreach ($rro->komponen as $rkmpnen)
                                            <tr style="font-weight: bold;">
                                                <td>{{ $rkmpnen->kdkmpnen }}</td>
                                                <td>{{ $rkmpnen->urkmpnen }}</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td style="text-align:right">{{ number_format($rkmpnen->item->sum('jumlah'),0,',','.') }}</td>
                                            </tr>
                                            {{-- foreach Subkomponen --}}
                                            @foreach ($rkmpnen->subkomponen as $rskmpnen)
                                                <tr>
                                                    <td>{{ $rskmpnen->kdskmpnen }}</td>
                                                    <td>{{ $rskmpnen->urskmpnen }}</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td style="text-align:right">{{ number_format($rskmpnen->item->sum('jumlah'),0,',','.') }}</td>
                                                </tr>
                                                {{-- foreach Akun --}}
                                                @foreach ($rskmpnen->akun as $rakun)
                                                    <tr>
                                                        <td style="text-align:right">{{ $rakun->kdakun }}</td>
                                                        <td>{{ $rakun->bas->nmakun }}</td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td style="text-align:right">{{ number_format($rakun->detail->sum('jumlah'),0,',','.') }}</td>
                                                    </tr>
                                                    {{-- foreach Item --}}
                                                    @foreach ($rakun->detail as $ritem)
                                                        <tr>
                                                            <td>&nbsp;</td>
                                                            <td>{{ $ritem->noitem.'. '.$ritem->nmitem }}</td>
                                                            <td style="text-align:right">{{ number_format($ritem->volkeg,1,',','.').' '.$ritem->satkeg }}</td>
                                                            <td style="text-align:right">{{ number_format($ritem->hargasat,0,',','.') }}</td>
                                                            <td style="text-align:right">{{ number_format($ritem->jumlah,0,',','.') }}</td>
                                                        </tr>
                                                    @endforeach
                                                @endforeach
                                            @endforeach
                                        @endforeach
                                    @endforeach
                                @endforeach
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <div class="float-right d-none d-sm-inline">
                     Menampilkan {{$prog->count()}} dari {{ $prog->total() }} data.
                </div>
                {{ $prog->links() }}
            </div>
        </div>
    </div>
@endsection
