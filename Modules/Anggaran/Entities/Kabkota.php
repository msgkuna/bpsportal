<?php

namespace Modules\Anggaran\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $kdlokasi
 * @property string $kdkabkota
 * @property string $nmkabkota
 */
class Kabkota extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'anggaran_mkabkota';

    /**
     * @var array
     */
    protected $fillable = ['nmkabkota'];

}
