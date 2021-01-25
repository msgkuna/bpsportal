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
 * @property string $kdakun
 * @property string $kdkppn
 * @property string $kdbeban
 * @property string $kdjnsban
 * @property string $kdctarik
 * @property string $register
 * @property string $carahitung
 * @property float $prosenphln
 * @property float $prosenrkp
 * @property float $prosenrmp
 * @property string $kppnrkp
 * @property string $kppnrmp
 * @property string $kppnphln
 * @property string $regdam
 * @property string $kdluncuran
 * @property string $kdblokir
 * @property string $uraiblokir
 * @property string $kdib
 */
class Dakun extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'anggaran_dakun';

    /**
     * @var array
     */
    protected $fillable = ['thang', 'kdjendok', 'kdsatker', 'kddept', 'kdunit', 'kdprogram', 'kdgiat', 'kdoutput', 'kdlokasi', 'kdkabkota', 'kddekon', 'kdsoutput', 'kdkmpnen', 'kdakun', 'kdkppn', 'kdbeban', 'kdjnsban', 'kdctarik', 'register', 'carahitung', 'prosenphln', 'prosenrkp', 'prosenrmp', 'kppnrkp', 'kppnrmp', 'kppnphln', 'regdam', 'kdluncuran', 'kdblokir', 'uraiblokir', 'kdib'];

}
