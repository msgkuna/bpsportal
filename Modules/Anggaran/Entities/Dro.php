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
 * @property string $kdsoutput
 * @property string $ursoutput
 * @property float $sbmkvol
 * @property string $sbmksat
 * @property float $sbmkmin1
 * @property string $kdsb
 * @property float $volsout
 * @property float $volsbk
 * @property string $kdib
 */
class Dro extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'anggaran_dro';

    /**
     * @var array
     */
    protected $fillable = ['thang', 'kdjendok', 'kdsatker', 'kddept', 'kdunit', 'kdprogram', 'kdgiat', 'kdoutput', 'kdlokasi', 'kdkabkota', 'kddekon', 'kdsoutput', 'ursoutput', 'sbmkvol', 'sbmksat', 'sbmkmin1', 'kdsb', 'volsout', 'volsbk', 'kdib'];

}
