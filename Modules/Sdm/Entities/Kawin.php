<?php

namespace Modules\Sdm\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $kawin_id
 * @property string $uraian
 * @property MitraDatum[] $mitraDatas
 * @property PegawaiDatum[] $pegawaiDatas
 * @property PpnpnDatum[] $ppnpnDatas
 */
class Kawin extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'master_kawin';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'kawin_id';

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
    protected $fillable = ['kawin_id', 'uraian'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mitra()
    {
        return $this->hasMany('Modules\Sdm\Entities\MitraDatum', 'kawin_id', 'kawin_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pegawai()
    {
        return $this->hasMany('Modules\Sdm\Entities\PegawaiData', 'kawin_id', 'kawin_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ppnpn()
    {
        return $this->hasMany('Modules\Sdm\Entities\PpnpnDatum', 'kawin_id', 'kawin_id');
    }
}
