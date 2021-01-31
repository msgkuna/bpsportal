<?php

namespace Modules\Anggaran\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Traits\CompositeKey;
use Awobaz\Compoships\Compoships;
use App\Traits\Blameable;

/**
 * @property string $thang
 * @property string $kdjendok
 * @property string $kdsatker
 * @property string $kddept
 * @property string $kdunit
 * @property string $kdprogram
 * @property string $kdgiat
 * @property string $kdoutput
 * @property string $kdlokasi
 * @property string $kdkabkota
 * @property string $kddekon
 * @property string $kdsoutput
 * @property string $kdkmpnen
 * @property string $kdskmpnen
 * @property string $kdakun
 * @property string $kdkppn
 * @property string $kdbeban
 * @property string $kdjnsban
 * @property string $kdctarik
 * @property string $register
 * @property string $carahitung
 * @property string $header1
 * @property string $header2
 * @property string $kdheader
 * @property float $noitem
 * @property string $nmitem
 * @property float $vol1
 * @property string $sat1
 * @property float $vol2
 * @property string $sat2
 * @property float $vol3
 * @property string $sat3
 * @property float $vol4
 * @property string $sat4
 * @property float $volkeg
 * @property string $satkeg
 * @property float $hargasat
 * @property float $jumlah
 * @property float $jumlah2
 * @property float $paguphln
 * @property float $pagurmp
 * @property float $pagurkp
 * @property string $kdblokir
 * @property float $blokirphln
 * @property float $blokirrmp
 * @property float $blokirrkp
 * @property float $rphblokir
 * @property string $kdcopy
 * @property string $kdabt
 * @property string $kdsbu
 * @property float $volsbk
 * @property float $volrkakl
 * @property string $blnkontrak
 * @property string $nokontrak
 * @property string $tgkontrak
 * @property float $nilkontrak
 * @property float $januari
 * @property float $pebruari
 * @property float $maret
 * @property float $april
 * @property float $mei
 * @property float $juni
 * @property float $juli
 * @property float $agustus
 * @property float $september
 * @property float $oktober
 * @property float $nopember
 * @property float $desember
 * @property float $jmltunda
 * @property string $kdluncuran
 * @property float $jmlabt
 * @property string $norev
 * @property string $kdubah
 * @property float $kurs
 * @property float $indexkpjm
 * @property string $kdib
 */
class Ditem extends Model
{
    use CompositeKey;
    use Compoships;
    use Blameable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'anggaran_ditem';
    protected $primaryKey = ['kddept', 'kdunit', 'kdprogram', 'kdgiat', 'kdoutput', 'kdsoutput', 'kdkmpnen', 'kdskmpnen', 'kdakun', 'noitem'];

    /**
     * @var array
     */
    protected $fillable = ['thang', 'kdjendok', 'kdsatker', 'kddept', 'kdunit', 'kdprogram', 'kdgiat', 'kdoutput', 'kdlokasi', 'kdkabkota',
                        'kddekon', 'kdsoutput', 'kdkmpnen', 'kdskmpnen', 'kdakun', 'kdkppn', 'kdbeban', 'kdjnsban', 'kdctarik', 'register',
                        'carahitung', 'header1', 'header2', 'kdheader', 'noitem', 'nmitem', 'vol1', 'sat1', 'vol2', 'sat2', 'vol3', 'sat3',
                        'vol4', 'sat4', 'volkeg', 'satkeg', 'hargasat', 'jumlah', 'jumlah2', 'paguphln', 'pagurmp', 'pagurkp', 'kdblokir',
                        'blokirphln', 'blokirrmp', 'blokirrkp', 'rphblokir', 'kdcopy', 'kdabt', 'kdsbu', 'volsbk', 'volrkakl', 'blnkontrak',
                        'nokontrak', 'tgkontrak', 'nilkontrak', 'januari', 'pebruari', 'maret', 'april', 'mei', 'juni', 'juli', 'agustus',
                        'september', 'oktober', 'nopember', 'desember', 'jmltunda', 'kdluncuran', 'jmlabt', 'norev', 'kdubah', 'kurs', 'indexkpjm',
                        'kdib', 'created_by', 'created_at', 'updated_by', 'updated_at'
                    ];

    public function akun()
    {
        return $this->belongsTo(Dakun::class,
            ['kddept', 'kdunit', 'kdprogram', 'kdgiat', 'kdoutput', 'kdsoutput', 'kdkmpnen', 'kdskmpnen', 'kdakun'],
            ['kddept', 'kdunit', 'kdprogram', 'kdgiat', 'kdoutput', 'kdsoutput', 'kdkmpnen', 'kdskmpnen', 'kdakun']
        );
    }

    public function aktivitas()
    {
        return $this->belongsTo(Giat::class,
        ['kddept', 'kdunit', 'kdprogram', 'kdgiat'],
        ['kddept', 'kdunit', 'kdprogram', 'kdgiat']
    );
    }
}
