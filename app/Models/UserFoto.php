<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class UserFoto extends Model
{
    protected $table = 'user_foto';
    protected $primaryKey = 'NO_FOTO';
    public $incrementing = false; // Set to true for auto-incrementing
    public $timestamps = false;

    // Tambahkan atribut fillable jika diperlukan.
    protected $fillable = [
        'NO_FOTO',
        'ID_USER',
        'FOTO',
        'CREATE_BY',
        'CREATE_DATE',
        'DELETE_MARK',
        'UPDATE_BY',
        'UPDATE_DATE',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'ID_USER', 'ID_USER');
    }
}