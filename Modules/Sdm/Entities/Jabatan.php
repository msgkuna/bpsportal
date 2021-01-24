<?php

namespace Modules\Sdm\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $jabatan_id
 * @property string $uraian
 * @property PegawaiDatum[] $pegawaiDatas
 * @property PegawaiJabatan[] $pegawaiJabatans
 */
class Jabatan extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'master_jabatan';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'jabatan_id';

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
    protected $fillable = ['jabatan_id', 'uraian'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pegawai()
    {
        return $this->hasMany('Modules\Sdm\Entities\PegawaiData', 'jabatan_id', 'jabatan_id');
    }

    public function tugas()
    {
        return $this->hasMany('Modules\Sdm\Entities\Tugas', 'jabatan_id', 'jabatan_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pegawaiJabatans()
    {
        return $this->hasMany('Modules\Sdm\Entities\PegawaiJabatan', 'jabatan_id', 'jabatan_id');
    }
}
