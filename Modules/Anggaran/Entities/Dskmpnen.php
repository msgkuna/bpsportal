<?php

namespace Modules\Anggaran\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Traits\CompositeKey;
use Awobaz\Compoships\Compoships;
use App\Traits\Blameable;

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
    use CompositeKey;
    use Compoships;
    use Blameable;
    // use \Staudenmeir\EloquentHasManyDeep\HasRelationships;
    // use \Znck\Eloquent\Traits\BelongsToThrough;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'anggaran_dskmpnen';
    protected $primaryKey = ['kddept', 'kdunit', 'kdprogram', 'kdgiat', 'kdoutput', 'kdsoutput', 'kdkmpnen', 'kdskmpnen'];

    /**
     * @var array
     */
    protected $fillable = ['thang', 'kdjendok', 'kdsatker', 'kddept', 'kdunit', 'kdprogram', 'kdgiat', 'kdoutput', 'kdlokasi',
                    'kdkabkota', 'kddekon', 'kdsoutput', 'kdkmpnen', 'kdskmpnen', 'urskmpnen', 'kdib',
                    'created_by', 'created_at', 'updated_by', 'updated_at'
                ];

    public function subkomponen()
    {
        return $this->belongsTo(Dkmpnen::class,
            ['kddept', 'kdunit', 'kdprogram', 'kdgiat', 'kdoutput', 'kdsoutput', 'kdkmpnen'],
            ['kddept', 'kdunit', 'kdprogram', 'kdgiat', 'kdoutput', 'kdsoutput', 'kdkmpnen']
        );
    }

    public function akun()
    {
        return $this->hasMany(Dakun::class,
            ['kddept', 'kdunit', 'kdprogram', 'kdgiat', 'kdoutput', 'kdsoutput', 'kdkmpnen', 'kdskmpnen'],
            ['kddept', 'kdunit', 'kdprogram', 'kdgiat', 'kdoutput', 'kdsoutput', 'kdkmpnen', 'kdskmpnen']
        );
    }

    public function item()
    {
        return $this->hasMany(Ditem::class,
            ['kddept', 'kdunit', 'kdprogram', 'kdgiat', 'kdoutput', 'kdsoutput', 'kdkmpnen', 'kdskmpnen'],
            ['kddept', 'kdunit', 'kdprogram', 'kdgiat', 'kdoutput', 'kdsoutput', 'kdkmpnen', 'kdskmpnen'],
        );
    }

    public function items()
    {
        // dskmpnen -> akun -> item
        return $this->hasManyDeep(
            Ditem::class, [Dakun::class], [
                ['kddept', 'kdunit', 'kdprogram', 'kdgiat', 'kdoutput', 'kdsoutput', 'kdkmpnen', 'kdskmpnen'],
                ['kddept', 'kdunit', 'kdprogram', 'kdgiat', 'kdoutput', 'kdsoutput', 'kdkmpnen', 'kdskmpnen', 'kdakun'],
            ],
            [
                ['kddept', 'kdunit', 'kdprogram', 'kdgiat', 'kdoutput', 'kdsoutput', 'kdkmpnen', 'kdskmpnen'],
                ['kddept', 'kdunit', 'kdprogram', 'kdgiat', 'kdoutput', 'kdsoutput', 'kdkmpnen', 'kdskmpnen', 'kdakun']
            ]
        );
    }
}
// Country → has many → User → has many → Post → has many → Comment
// public function comments()
// {
//     return $this->hasManyDeep(
//         'App\Comment',
//         ['App\User', 'App\Post'], // Intermediate models, beginning at the far parent (Country).
//         [
//            'country_id', // Foreign key on the "users" table.
//            'user_id',    // Foreign key on the "posts" table.
//            'post_id'     // Foreign key on the "comments" table.
//         ],
//         [
//           'id', // Local key on the "countries" table.
//           'id', // Local key on the "users" table.
//           'id'  // Local key on the "posts" table.
//         ]
//     );
// }
