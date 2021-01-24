<?php

namespace Modules\Sdm\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $didik_id
 * @property string $uraian
 * @property MitraDatum[] $mitraDatas
 * @property PegawaiDatum[] $pegawaiDatas
 * @property PegawaiDidik[] $pegawaiDidiks
 * @property PpnpnDatum[] $ppnpnDatas
 */
class Pendidikan extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'master_didik';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'didik_id';

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
     * agar tidak laravel tidak mencari field updated_at dan created_at
     *
     * @var boolean
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['didik_id', 'uraian'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mitraDatas()
    {
        return $this->hasMany('Modules\Sdm\Entities\MitraDatum', 'didik_id', 'didik_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pegawai()
    {
        return $this->hasMany('Modules\Sdm\Entities\PegawaiData', 'didik_id', 'didik_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pegawaiDidiks()
    {
        return $this->hasMany('Modules\Sdm\Entities\PegawaiDidik', 'didik_id', 'didik_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ppnpnDatas()
    {
        return $this->hasMany('Modules\Sdm\Entities\PpnpnDatum', 'didik_id', 'didik_id');
    }
}
