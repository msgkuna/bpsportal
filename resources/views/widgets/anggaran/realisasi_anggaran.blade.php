<div class="info-box bg-gradient-info">
    <span class="info-box-icon"><i class="fas fa-building"></i></span>
    <div class="info-box-content">
        <span class="info-box-text">Total Anggaran</span>
        <span class="info-box-number">{{ number_format($anggaran->jumlah,0,',','.') }}</span>
        <div class="progress">
            <div class="progress-bar" style="width: 90%"></div>
        </div>
        <span class="progress-description">Realisasi 90%</span>
    </div>
</div>
