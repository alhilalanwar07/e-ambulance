<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rumahsakit extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $table = 'rumahsakits';

    protected $fillable = ['nama','alamat','no_telp','longitude','latitude','province_id','regency_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pesanans()
    {
        return $this->hasMany('App\Models\Pesanan', 'rumahsakit_id', 'id');
    }

    //hasMany to Province
    public function province()
    {
        return $this->belongsTo('App\Models\Province', 'province_id', 'id');
    }

    // hasMany to Regency
    public function regency()
    {
        return $this->belongsTo('App\Models\Regency', 'regency_id', 'id');
    }

}
