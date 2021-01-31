<div class="card card-outline card-secondary">
    <div class="card-header border-0">
        <h3 class="card-title">Daftar User Yang Login</h3>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover table-striped table-bordered table-sm table-valign-middle">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" style="width:10%;">NIP</th>
                    <th scope="col">Nama Lengkap</th>
                    <th scope="col">Akun</th>
                    <th scope="col">Terakhir Login</th>
            </tr>
            </thead>
            <tbody>
                @forelse ($userLogin as $row)
                <tr>
                    <td scope="row">{{ $row->nip }}</td>
                    <td>{{ $row->pegawai->nama }}</td>
                    <td>{{ $row->username }}</td>
                    <td>{{ \Carbon\Carbon::parse($row['last_login_at'])->diffForHumans() }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" scope="colgroup" class="text-center">Tidak ada data</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
