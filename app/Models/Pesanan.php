<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
	use HasFactory;

    public $timestamps = true;

    protected $table = 'pesanans';

    protected $fillable = ['pelanggan_id','rumahsakit_id','supir_id','kategori_id','nama_pasien','alamat_jemput','longitude_jemput','latitude_jemput','no_telp', 'keterangan_pasien', 'status'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function kategori()
    {
        return $this->hasOne('App\Models\Kategori', 'id', 'kategori_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pelanggan()
    {
        return $this->hasOne('App\Models\Pelanggan', 'id', 'pelanggan_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function rumahsakit()
    {
        return $this->hasOne('App\Models\Rumahsakit', 'id', 'rumahsakit_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function supir()
    {
        return $this->hasOne('App\Models\Supir', 'id', 'supir_id');
    }

}
