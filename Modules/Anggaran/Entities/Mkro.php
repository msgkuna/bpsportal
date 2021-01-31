<?php

namespace Modules\Anggaran\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Traits\CompositeKey;
use Awobaz\Compoships\Compoships;
use App\Traits\Blameable;

/**
 * @property string $kddept
 * @property string $kdunit
 * @property string $kdprogram
 * @property string $kdgiat
 * @property string $kdoutput
 * @property string $nmoutput
 */
class Mkro extends Model
{
    use CompositeKey;
    use Compoships;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'anggaran_mkro';
    protected $primaryKey = ['kddept', 'kdunit', 'kdprogram', 'kdgiat', 'kdoutput'];
    public $timestamps = false;
    /**
     * @var array
     */
    protected $fillable = ['kddept', 'kdunit', 'kdprogram', 'kdgiat', 'kdoutput', 'nmoutput'];

    public function d_kro()
    {
        return $this->hasMany(Dkro::class,
            ['kddept', 'kdunit', 'kdprogram', 'kdgiat', 'kdoutput'],
            ['kddept', 'kdunit', 'kdprogram', 'kdgiat', 'kdoutput']
        );
    }

}
