<div class="card card-outline card-secondary">
    <div class="card-header border-0">
        <h3 class="card-title">Realisasi Anggaran</h3>
        <div class="card-tool" style="text-align: right;">
            <span class="badge bg-danger">0 - 39</span>
            <span class="badge bg-warning">40 - 79</span>
            <span class="badge bg-success">80 - 100</span>
        </div>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover table-striped table-bordered table-sm table-valign-middle">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" style="text-align: center; width:10%;">Kode</th>
                    <th scope="col" style="text-align: center;">Aktivitas</th>
                    <th scope="col" style="text-align: center; width:12%">Anggaran</th>
                    <th scope="col" style="text-align: center; width:12%">Realisasi</th>
                    <th scope="col" colspan="2" style="text-align: center; width:13%">Progress</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($giat as $item)
                <tr>
                    <td scope="row">{{ $item->kddept.'.'.$item->kdunit.'.'.$item->kdprogram.'.'.$item->kdgiat }}</td>
                    <td>{{ $item->aktivitas->nmgiat }}</td>
                    <td style="text-align: right">{{ number_format($item->jumlah,0,',','.') }}</td>
                    <td style="text-align: right">{{ number_format($item->jumlah,0,',','.') }}</td>
                    <td style="text-align: center; width:11%">
                        <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar bg-warning" style="width: 70%"></div>
                        </div>
                    </td>
                    <td style="text-align: right; width:2%"><span class="badge bg-warning">70%</span></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
