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
 * @property string $kdbiaya
 * @property string $kdsbiaya
 * @property string $urkmpnen
 * @property string $kdtema
 * @property float $rphpls1
 * @property float $rphpls2
 * @property float $rphpls3
 * @property float $rphmin1
 * @property string $thangawal
 * @property string $thangakhir
 * @property string $indekskali
 * @property string $kdib
 * @property string $indeksout
 * @property string $n1
 * @property string $n2
 * @property string $n3
 * @property string $n4
 * @property float $rphn1
 * @property float $rphn2
 * @property float $rphn3
 * @property float $rphn4
 */
class Dkmpnen extends Model
{
    use CompositeKey;
    use Compoships;
    use Blameable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'anggaran_dkmpnen';
    protected $primaryKey = ['kddept', 'kdunit', 'kdprogram', 'kdgiat', 'kdoutput', 'kdsoutput', 'kdkmpnen'];

    /**
     * @var array
     */
    protected $fillable = ['thang', 'kdjendok', 'kdsatker', 'kddept', 'kdunit', 'kdprogram', 'kdgiat', 'kdoutput',
                    'kdlokasi', 'kdkabkota', 'kddekon', 'kdsoutput', 'kdkmpnen', 'kdbiaya', 'kdsbiaya', 'urkmpnen',
                    'kdtema', 'rphpls1', 'rphpls2', 'rphpls3', 'rphmin1', 'thangawal', 'thangakhir', 'indekskali',
                    'kdib', 'indeksout', 'n1', 'n2', 'n3', 'n4', 'rphn1', 'rphn2', 'rphn3', 'rphn4',
                    'created_by', 'created_at', 'updated_by', 'updated_at'
                ];

    public function ro()
    {
        return $this->belongsTo(Dro::class,
            ['kddept', 'kdunit', 'kdprogram', 'kdgiat', 'kdoutput', 'kdsoutput'],
            ['kddept', 'kdunit', 'kdprogram', 'kdgiat', 'kdoutput', 'kdsoutput']
        );
    }

    public function subkomponen()
    {
        return $this->hasMany(Dskmpnen::class,
            ['kddept', 'kdunit', 'kdprogram', 'kdgiat', 'kdoutput', 'kdsoutput', 'kdkmpnen'],
            ['kddept', 'kdunit', 'kdprogram', 'kdgiat', 'kdoutput', 'kdsoutput', 'kdkmpnen']
        );
    }

    public function item()
    {
        return $this->hasMany(Ditem::class,
            ['kddept', 'kdunit', 'kdprogram', 'kdgiat', 'kdoutput', 'kdsoutput', 'kdkmpnen'],
            ['kddept', 'kdunit', 'kdprogram', 'kdgiat', 'kdoutput', 'kdsoutput', 'kdkmpnen'],
        );
    }

}
