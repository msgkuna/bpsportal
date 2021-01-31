<?php

namespace Modules\Anggaran\Entities;

use Illuminate\Database\Eloquent\Model;
use Awobaz\Compoships\Compoships;

/**
 * @property string $kdsatker
 * @property string $nmsatker
 * @property string $kddept
 * @property string $kdunit
 * @property string $kdlokasi
 * @property string $kdkabkota
 */
class Satker extends Model
{
    use Compoships;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'anggaran_msatker';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'kdsatker';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['nmsatker', 'kddept', 'kdunit', 'kdlokasi', 'kdkabkota'];

}
