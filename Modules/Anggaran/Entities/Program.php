<?php

namespace Modules\Anggaran\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Traits\CompositeKey;
use Awobaz\Compoships\Compoships;

/**
 * @property string $kddept
 * @property string $kdunit
 * @property string $kdprogram
 * @property string $nmprogram
 */
class Program extends Model
{
    use CompositeKey;
    use Compoships;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'anggaran_mprogram';
    protected $primaryKey = ['kddept', 'kdunit', 'kdprogram'];
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['kdprogram', 'nmprogram'];

    public function unit()
    {
        return $this->belongsTo(Unit::class,
            ['kddept', 'kdunit'],
            ['kddept', 'kdunit']
        );
    }

    public function giat()
    {
        return $this->hasMany(Giat::class,
            ['kddept', 'kdunit', 'kdprogram'],
            ['kddept', 'kdunit', 'kdprogram']
        );
    }

    public function item()
    {
        return $this->hasMany(Ditem::class,
            ['kddept', 'kdunit', 'kdprogram'],
            ['kddept', 'kdunit', 'kdprogram']
        );
    }


}
