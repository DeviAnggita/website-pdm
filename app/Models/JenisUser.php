<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class JenisUser extends Model
{
    protected $table = 'jenis_user';
    protected $primaryKey = 'ID_JENIS_USER';
    public $timestamps = false; // Jika tidak menggunakan kolom created_at dan updated_at.

    // Tambahkan atribut fillable jika diperlukan.
    protected $fillable = [
        'NAME_JENIS_USER',
    ];
}