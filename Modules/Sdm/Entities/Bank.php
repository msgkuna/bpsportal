<?php

namespace Modules\Sdm\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $bank_id
 * @property string $uraian
 * @property MitraDatum[] $mitraDatas
 * @property PegawaiDatum[] $pegawaiDatas
 * @property PpnpnDatum[] $ppnpnDatas
 */
class Bank extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'master_bank';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'bank_id';

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
    protected $fillable = ['bank_id', 'uraian'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mitraDatas()
    {
        return $this->hasMany('Modules\Sdm\Entities\MitraDatum', 'bank_id', 'bank_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pegawaiDatas()
    {
        return $this->hasMany('Modules\Sdm\Entities\PegawaiDatum', 'bank_id', 'bank_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ppnpnDatas()
    {
        return $this->hasMany('Modules\Sdm\Entities\PpnpnDatum', 'bank_id', 'bank_id');
    }
}
