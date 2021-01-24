<?php

namespace Modules\Sdm\Entities;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'master_status';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'status_id';

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
    protected $fillable = ['status_id', 'uraian'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pegawai()
    {
        return $this->hasMany('Modules\Sdm\Entities\PegawaiData', 'status_id', 'status_id');
    }

}
