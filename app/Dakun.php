<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $kdsatker
 * @property string $kdprogram
 * @property string $kdgiat
 * @property string $kdoutput
 * @property string $kdsoutput
 * @property string $kdkmpnen
 * @property string $kdskmpnen
 * @property string $kdakun
 * @property string $thang
 * @property string $kdjendok
 * @property string $kddept
 * @property string $kdunit
 * @property string $kdlokasi
 * @property string $kdkabkota
 * @property string $kddekon
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
 * @property string $created_by
 * @property string $updated_by
 * @property string $created_at
 * @property string $updated_at
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
    protected $fillable = ['thang', 'kdjendok', 'kddept', 'kdunit', 'kdlokasi', 'kdkabkota', 'kddekon', 'kdkppn', 'kdbeban', 'kdjnsban', 'kdctarik', 'register', 'carahitung', 'prosenphln', 'prosenrkp', 'prosenrmp', 'kppnrkp', 'kppnrmp', 'kppnphln', 'regdam', 'kdluncuran', 'kdblokir', 'uraiblokir', 'kdib', 'created_by', 'updated_by', 'created_at', 'updated_at'];

}
