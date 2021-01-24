<?php

namespace Modules\Sdm\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $pangkat_id
 * @property string $gol_ruang
 * @property string $uraian
 * @property PegawaiDatum[] $pegawaiDatas
 * @property PegawaiPangkat[] $pegawaiPangkats
 */
class Pangkat extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'master_pangkat';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'pangkat_id';

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
    protected $fillable = ['pangkat_id', 'gol_ruang', 'uraian'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pegawai()
    {
        return $this->hasMany('Modules\Sdm\Entities\PegawaiData', 'pangkat_id', 'pangkat_id');
    }

}
