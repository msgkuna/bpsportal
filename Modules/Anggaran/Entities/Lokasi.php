<?php

namespace Modules\Anggaran\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $kdlokasi
 * @property string $nmlokasi
 */
class Lokasi extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'anggaran_mlokasi';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'kdlokasi';

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
    protected $fillable = ['nmlokasi'];

}
