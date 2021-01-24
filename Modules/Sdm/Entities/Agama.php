<?php

namespace Modules\Sdm\Entities;

use Illuminate\Database\Eloquent\Model;

class Agama extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'master_agama';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'agama_id';

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
    protected $fillable = ['agama_id', 'uraian'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mitraDatas()
    {
        return $this->hasMany('App\MitraDatum', 'agama_id', 'agama_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pegawai()
    {
        return $this->hasMany('Modules\Sdm\Entities\PegawaiData', 'agama_id', 'agama_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ppnpnDatas()
    {
        return $this->hasMany('App\PpnpnDatum', 'agama_id', 'agama_id');
    }

}
