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
class Dro extends Model
{
    use CompositeKey;
    use Compoships;
    use Blameable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'anggaran_dro';
    protected $primaryKey = ['kddept', 'kdunit', 'kdprogram', 'kdgiat', 'kdoutput', 'kdsoutput'];

    /**
     * @var array
     */
    protected $fillable = ['thang', 'kdjendok', 'kdsatker', 'kddept', 'kdunit', 'kdprogram', 'kdgiat',
                        'kdoutput', 'kdlokasi', 'kdkabkota', 'kddekon', 'kdsoutput', 'ursoutput',
                        'sbmkvol', 'sbmksat', 'sbmkmin1', 'kdsb', 'volsout', 'volsbk', 'kdib',
                        'created_by', 'created_at', 'updated_by', 'updated_at'
                    ];

    public function kro()
    {
        return $this->belongsTo(Dkro::class,
            ['kddept', 'kdunit', 'kdprogram', 'kdgiat', 'kdoutput'],
            ['kddept', 'kdunit', 'kdprogram', 'kdgiat', 'kdoutput']
        );
    }

    public function komponen()
    {
        return $this->hasMany(Dkmpnen::class,
            ['kddept', 'kdunit', 'kdprogram', 'kdgiat', 'kdoutput', 'kdsoutput'],
            ['kddept', 'kdunit', 'kdprogram', 'kdgiat', 'kdoutput', 'kdsoutput']
        );
    }

    public function item()
    {
        return $this->hasMany(Ditem::class,
            ['kddept', 'kdunit', 'kdprogram', 'kdgiat', 'kdoutput', 'kdsoutput'],
            ['kddept', 'kdunit', 'kdprogram', 'kdgiat', 'kdoutput', 'kdsoutput'],
        );
    }

    public function mro()
    {
        return $this->belongsTo(Mro::class,
            ['kddept', 'kdunit', 'kdprogram', 'kdgiat', 'kdoutput', 'kdsoutput'],
            ['kddept', 'kdunit', 'kdprogram', 'kdgiat', 'kdoutput', 'kdsoutput']
        );
    }

}
