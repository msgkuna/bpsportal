<?php

namespace Modules\Anggaran\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Traits\CompositeKey;
use Awobaz\Compoships\Compoships;

/**
 * @property string $kdgiat
 * @property string $nmgiat
 * @property string $kddept
 * @property string $kdunit
 * @property string $kdprogram
 */
class Giat extends Model
{
    use CompositeKey;
    use Compoships;

    protected $table = 'anggaran_mgiat';

    protected $primaryKey = ['kddept', 'kdunit', 'kdprogram', 'kdgiat'];
    public $timestamps = false;

    protected $fillable = ['kdgiat', 'nmgiat'];

    public function program()
    {
        return $this->belongsTo(Program::class,
            ['kddept', 'kdunit', 'kdprogram'],
            ['kddept', 'kdunit', 'kdprogram']
        );
    }

    public function kro()
    {
        return $this->hasMany(Dkro::class,
            ['kddept', 'kdunit', 'kdprogram', 'kdgiat'],
            ['kddept', 'kdunit', 'kdprogram', 'kdgiat']
        );
    }

    public function item()
    {
        return $this->hasMany(Ditem::class,
            ['kddept', 'kdunit', 'kdprogram', 'kdgiat'],
            ['kddept', 'kdunit', 'kdprogram', 'kdgiat']
        );
    }

}
