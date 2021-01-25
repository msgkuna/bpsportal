<?php

namespace Modules\Anggaran\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $thang
 * @property string $kdjendok
 * @property string $kdsatker
 * @property string $kddept
 * @property string $kdunit
 * @property string $kdprogram
 * @property string $kdgiat
 * @property string $kdoutput
 * @property string $kdlokasi
 * @property string $kdkabkota
 * @property string $kddekon
 * @property string $kdsoutput
 * @property string $kdkmpnen
 * @property string $kdskmpnen
 * @property string $urskmpnen
 * @property string $kdib
 */
class Dskmpnen extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'anggaran_dskmpnen';

    /**
     * @var array
     */
    protected $fillable = ['thang', 'kdjendok', 'kdsatker', 'kddept', 'kdunit', 'kdprogram', 'kdgiat', 'kdoutput', 'kdlokasi', 'kdkabkota', 'kddekon', 'kdsoutput', 'kdkmpnen', 'kdskmpnen', 'urskmpnen', 'kdib'];

}
