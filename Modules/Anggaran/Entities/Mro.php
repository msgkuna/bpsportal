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
 * @property string $ursoutput
 * @property float $sbmkvol
 * @property string $sbmksat
 * @property float $sbmkmin1
 * @property string $kdsb
 * @property float $volsout
 * @property float $volsbk
 * @property string $kdib
 */
class Mro extends Model
{
    use CompositeKey;
    use Compoships;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'anggaran_mro';
    protected $primaryKey = ['kddept', 'kdunit', 'kdprogram', 'kdgiat', 'kdoutput', 'kdsoutput'];

    /**
     * @var array
     */
    protected $fillable = ['kddept', 'kdunit', 'kdprogram', 'kdgiat', 'kdoutput', 'kdsoutput', 'jnssoutput'];

    public function d_ro()
    {
        return $this->hasMany(Dro::class,
            ['kddept', 'kdunit', 'kdprogram', 'kdgiat', 'kdoutput', 'kdsoutput'],
            ['kddept', 'kdunit', 'kdprogram', 'kdgiat', 'kdoutput', 'kdsoutput']
        );
    }

}
