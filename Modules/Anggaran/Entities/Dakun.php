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
 * @property string $kdakun
 * @property string $kdkppn
 * @property string $kdbeban
 * @property string $kdjnsban
 * @property string $kdctarik
 * @property string $register
 * @property string $carahitung
 * @property float $prosenphln
 * @property float $prosenrkp
 * @property float $prosenrmp
 * @property string $kppnrkp
 * @property string $kppnrmp
 * @property string $kppnphln
 * @property string $regdam
 * @property string $kdluncuran
 * @property string $kdblokir
 * @property string $uraiblokir
 * @property string $kdib
 */
class Dakun extends Model
{
    use CompositeKey;
    use Compoships;
    use Blameable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'anggaran_dakun';
    protected $primaryKey = ['kddept', 'kdunit', 'kdprogram', 'kdgiat', 'kdoutput', 'kdsoutput', 'kdkmpnen', 'kdskmpnen', 'kdakun'];

    /**
     * @var array
     */
    protected $fillable = ['thang', 'kdjendok', 'kdsatker', 'kddept', 'kdunit', 'kdprogram', 'kdgiat', 'kdoutput', 'kdlokasi',
                    'kdkabkota', 'kddekon', 'kdsoutput', 'kdkmpnen', 'kdskmpnen', 'kdakun', 'kdkppn', 'kdbeban', 'kdjnsban',
                    'kdctarik', 'register', 'carahitung', 'prosenphln', 'prosenrkp', 'prosenrmp', 'kppnrkp', 'kppnrmp',
                    'kppnphln', 'regdam', 'kdluncuran', 'kdblokir', 'uraiblokir', 'kdib',
                    'created_by', 'created_at', 'updated_by', 'updated_at'
                ];

    public function subkomponen()
    {
        return $this->belongsTo(Dskmpnen::class,
            ['kddept', 'kdunit', 'kdprogram', 'kdgiat', 'kdoutput', 'kdsoutput', 'kdkmpnen', 'kdskmpnen'],
            ['kddept', 'kdunit', 'kdprogram', 'kdgiat', 'kdoutput', 'kdsoutput', 'kdkmpnen', 'kdskmpnen']
        );
    }

    public function detail()
    {
        return $this->hasMany(Ditem::class,
            ['kddept', 'kdunit', 'kdprogram', 'kdgiat', 'kdoutput', 'kdsoutput', 'kdkmpnen', 'kdskmpnen', 'kdakun'],
            ['kddept', 'kdunit', 'kdprogram', 'kdgiat', 'kdoutput', 'kdsoutput', 'kdkmpnen', 'kdskmpnen', 'kdakun']
        );
    }

    public function bas()
    {
        return $this->belongsTo(Makun::class, 'kdakun', 'kdakun');
    }
}
