<?php

namespace Modules\Sdm\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Traits\CompositeKey;
use Awobaz\Compoships\Compoships;

class Tugas extends Model
{
    use CompositeKey;
    use Compoships;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'master_tugas';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = ['jabatan_id', 'tugas_id'];

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
    protected $fillable = ['jabatan_id', 'tugas_id', 'uraian'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jabatan()
    {
        return $this->belongsTo('Modules\Sdm\Entities\Jabatan', 'jabatan_id', 'jabatan_id');
    }

    public function pegawai()
    {
        return $this->hasMany('Modules\Sdm\Entities\Tugas', ['jabatan_id', 'tugas_id'], ['jabatan_id', 'tugas_id']);
    }

}
