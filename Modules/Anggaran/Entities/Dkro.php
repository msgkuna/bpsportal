<?php

namespace Modules\Anggaran\Entities;

use Illuminate\Database\Eloquent\Model;

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
 * @property float $volmin1
 * @property float $vol
 * @property float $volpls1
 * @property float $volpls2
 * @property float $volpls3
 * @property float $volsbk
 * @property float $rphmin1
 * @property float $rphpls1
 * @property float $rphpls2
 * @property float $rphpls3
 * @property string $sbkket
 * @property float $sbkmin1
 * @property string $kdsb
 * @property string $kdjoutput
 * @property string $thangawal
 * @property string $thangakhir
 * @property string $kdtema
 * @property string $kdib
 * @property string $kdauto
 * @property string $kdmulti
 */
class Dkro extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'anggaran_dkro';

    /**
     * @var array
     */
    protected $fillable = ['thang', 'kdjendok', 'kdsatker', 'kddept', 'kdunit', 'kdprogram', 'kdgiat', 'kdoutput', 'kdlokasi', 'kdkabkota', 'kddekon', 'volmin1', 'vol', 'volpls1', 'volpls2', 'volpls3', 'volsbk', 'rphmin1', 'rphpls1', 'rphpls2', 'rphpls3', 'sbkket', 'sbkmin1', 'kdsb', 'kdjoutput', 'thangawal', 'thangakhir', 'kdtema', 'kdib', 'kdauto', 'kdmulti'];

}
