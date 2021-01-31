<?php

namespace Modules\Anggaran\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Traits\CompositeKey;
use Awobaz\Compoships\Compoships;

/**
 * @property string $kddept
 * @property string $kdunit
 * @property string $nmunit
 */
class Unit extends Model
{
    use CompositeKey;
    use Compoships;

    protected $table = 'anggaran_munit';
    protected $primaryKey = ['kddept', 'kdunit'];
    public $timestamps = false;

    protected $fillable = ['kdunit', 'nmunit'];

    public function dept()
    {
        return $this->belongsTo(Dept::class, 'kddept', 'kddept');
    }

    public function program()
    {
        return $this->hasMany(Program::class, ['kddept', 'kdunit'], ['kddept', 'kdunit']);
    }

}
