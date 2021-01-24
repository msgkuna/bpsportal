<?php

namespace Modules\Sdm\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Blameable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Awobaz\Compoships\Compoships;
/**
 * @property string $nip
 * @property string $kawin_id
 * @property string $agama_id
 * @property string $pangkat_id
 * @property string $jabatan_id
 * @property string $didik_id
 * @property string $satker_id
 * @property string $bank_id
 * @property string $nipbaru
 * @property string $nik
 * @property string $nama
 * @property string $gelar_depan
 * @property string $gelar_belakang
 * @property string $tanggal_lahir
 * @property string $jenis_kelamin
 * @property string $npwp
 * @property string $tmt_cpns
 * @property string $email
 * @property string $alamat
 * @property string $no_rekening
 * @property string $flag
 * @property string $created_by
 * @property string $updated_by
 * @property string $deleted_by
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * @property MasterAgama $masterAgama
 * @property MasterBank $masterBank
 * @property MasterDidik $masterDidik
 * @property MasterJabatan $masterJabatan
 * @property MasterKawin $masterKawin
 * @property MasterPangkat $masterPangkat
 * @property MasterSatker $masterSatker
 * @property PegawaiDidik[] $pegawaiDidiks
 * @property PegawaiJabatan[] $pegawaiJabatans
 * @property PegawaiPangkat[] $pegawaiPangkats
 * @property PokjaAnggotum[] $pokjaAnggotas
 * @property TeleponDatum[] $teleponDatas
 */
class PegawaiData extends Model
{

    use Blameable;
    // use SoftDeletes;
    use Compoships;
        /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pegawai_data';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'nip';

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
     * @var array
     */
    protected $fillable = ['nip', 'kawin_id', 'agama_id', 'pangkat_id', 'jabatan_id', 'tugas_id', 'didik_id', 'satker_id', 'nipbaru', 'nik', 'nama', 'gelar_depan', 'gelar_belakang', 'tanggal_lahir', 'jenis_kelamin', 'npwp', 'tmt_cpns', 'email', 'alamat', 'status_id', 'created_by', 'updated_by', 'deleted_by', 'deleted_at', 'created_at', 'updated_at'];
    // protected $fillable = ['nip', 'kawin_id', 'agama_id', 'pangkat_id', 'jabatan_id', 'didik_id', 'satker_id', 'nipbaru', 'nik', 'nama', 'gelar_depan', 'gelar_belakang', 'npwp', 'email', 'alamat'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function agama()
    {
        return $this->belongsTo('Modules\Sdm\Entities\Agama', 'agama_id', 'agama_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bank()
    {
        return $this->belongsTo('Modules\Sdm\Entities\Bank', 'bank_id', 'bank_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function didik()
    {
        return $this->belongsTo('Modules\Sdm\Entities\Pendidikan', 'didik_id', 'didik_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jabatan()
    {
        return $this->belongsTo('Modules\Sdm\Entities\Jabatan', 'jabatan_id', 'jabatan_id');
    }

    public function tugas()
    {
        return $this->belongsTo('Modules\Sdm\Entities\Tugas', ['jabatan_id', 'tugas_id'], ['jabatan_id', 'tugas_id']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function kawin()
    {
        return $this->belongsTo('Modules\Sdm\Entities\Kawin', 'kawin_id', 'kawin_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pangkat()
    {
        return $this->belongsTo('Modules\Sdm\Entities\Pangkat', 'pangkat_id', 'pangkat_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function satker()
    {
        return $this->belongsTo('Modules\Sdm\Entities\Satker', 'satker_id', 'satker_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pokja()
    {
        return $this->hasMany('Modules\Sdm\Entities\PokjaAnggotum', 'nip', 'nip');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function telepon()
    {
        return $this->hasMany('Modules\Sdm\Entities\TeleponDatum', 'nik', 'nik');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'nip', 'nip');
    }

    public function status()
    {
        return $this->belongsTo('Modules\Sdm\Entities\Status', 'status_id', 'status_id');
    }

}
