<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
	use HasFactory;

    public $timestamps = true;

    protected $table = 'kategoris';

    protected $fillable = ['nama','warna', 'keterangan'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pesanans()
    {
        return $this->hasMany('App\Models\Pesanan', 'kategori_id', 'id');
    }

}
