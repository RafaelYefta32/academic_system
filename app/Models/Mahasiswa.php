<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    //

    protected $table = 'mahasiswa';
    protected $primaryKey = 'nrp';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'nrp',
        'nama',
        'alamat',
        'birth_date',
        'phone',
        'email',
        'profile_picture',
        'dosen_nik',
    ];

    public function dosenWali(){
        return $this->belongsTo(Dosen::class, 'dosen_nik');
    }
}
