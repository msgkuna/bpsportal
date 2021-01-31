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
    use CompositeKey;
    use Compoships;
    use Blameable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'anggaran_dkro';
    protected $primaryKey = ['kddept', 'kdunit', 'kdprogram', 'kdgiat', 'kdoutput'];

    /**
     * @var array
     */
    protected $fillable = ['thang', 'kdjendok', 'kdsatker', 'kddept', 'kdunit', 'kdprogram',
                        'kdgiat', 'kdoutput', 'kdlokasi', 'kdkabkota', 'kddekon', 'volmin1',
                        'vol', 'volpls1', 'volpls2', 'volpls3', 'volsbk', 'rphmin1', 'rphpls1',
                        'rphpls2', 'rphpls3', 'sbkket', 'sbkmin1', 'kdsb', 'kdjoutput', 'thangawal',
                        'thangakhir', 'kdtema', 'kdib', 'kdauto', 'kdmulti',
                        'created_by', 'created_at', 'updated_by', 'updated_at'
                    ];

    public function giat()
    {
        return $this->belongsTo(Giat::class,
            ['kddept', 'kdunit', 'kdprogram', 'kdgiat'],
            ['kddept', 'kdunit', 'kdprogram', 'kdgiat']
        );
    }

    public function ro()
    {
        return $this->hasMany(Dro::class,
            ['kddept', 'kdunit', 'kdprogram', 'kdgiat', 'kdoutput'],
            ['kddept', 'kdunit', 'kdprogram', 'kdgiat', 'kdoutput']
        );
    }

    public function mkro()
    {
        return $this->belongsTo(Mkro::class,
            ['kddept', 'kdunit', 'kdprogram', 'kdgiat', 'kdoutput'],
            ['kddept', 'kdunit', 'kdprogram', 'kdgiat', 'kdoutput']
        );
    }

    public function mdept()
    {
        return $this->belongsTo(Dept::class, 'kddept', 'kddept');
    }

    public function munit()
    {
        return $this->belongsTo(Unit::class,
            ['kddept', 'kdunit'],
            ['kddept', 'kdunit']
        );
    }

    public function msatker()
    {
        return $this->belongsTo(Satker::class,
            ['kddept', 'kdunit', 'kdsatker'],
            ['kddept', 'kdunit', 'kdsatker']
        );
    }

    public function item()
    {
        return $this->hasMany(Ditem::class,
            ['kddept', 'kdunit', 'kdprogram', 'kdgiat', 'kdoutput'],
            ['kddept', 'kdunit', 'kdprogram', 'kdgiat', 'kdoutput'],
        );
    }

}
