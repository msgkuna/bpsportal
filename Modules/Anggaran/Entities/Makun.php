<?php

namespace Modules\Anggaran\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Traits\CompositeKey;
use Awobaz\Compoships\Compoships;

class Makun extends Model
{
    use CompositeKey;
    use Compoships;

    protected $table = 'anggaran_makun';
    protected $primaryKey = 'kdakun';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = ['kdakun', 'nmakun'];

    public function makun()
    {
        return $this->hasMany(Dakun::class, ['kdakun'], ['kdakun']);
    }

}
