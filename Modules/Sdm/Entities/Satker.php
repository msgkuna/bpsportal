<?php

namespace Modules\Sdm\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $satker_id
 * @property string $uraian
 * @property string $eselon
 * @property MitraDatum[] $mitraDatas
 * @property PegawaiDatum[] $pegawaiDatas
 * @property PpnpnDatum[] $ppnpnDatas
 */
class Satker extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'master_satker';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'satker_id';

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
    protected $fillable = ['satker_id', 'uraian', 'eselon'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mitraDatas()
    {
        return $this->hasMany('Modules\Sdm\Entities\MitraDatum', 'satker_id', 'satker_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pegawai()
    {
        return $this->hasMany('Modules\Sdm\Entities\PegawaiData', 'satker_id', 'satker_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ppnpnDatas()
    {
        return $this->hasMany('Modules\Sdm\Entities\PpnpnDatum', 'satker_id', 'satker_id');
    }
}
