<?php

namespace Modules\Sdm\Entities;

use Illuminate\Database\Eloquent\Model;

class Jenjang extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'master_fungsional_jenjang';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'jenjang_id';

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
    protected $fillable = ['jenjang_id', 'uraian', 'gol_rendah', 'gol_tinggi'];

    public function pangkat_rendah()
    {
        return $this->belongsTo('Modules\Sdm\Entities\Pangkat', 'gol_rendah', 'pangkat_id');
    }

    public function pangkat_tinggi()
    {
        return $this->belongsTo('Modules\Sdm\Entities\Pangkat', 'gol_tinggi', 'pangkat_id');
    }

}
