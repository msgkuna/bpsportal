<?php

namespace Modules\Anggaran\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $kddept
 * @property string $nmdept
 */
class Dept extends Model
{
    protected $table = 'anggaran_mdept';
    protected $primaryKey = 'kddept';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = ['kddept', 'nmdept'];

    public function unit()
    {
        return $this->hasMany(Unit::class, 'kddept', 'kddept');
    }

}
