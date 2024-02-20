<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Builder;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    protected $table = 'users';
    protected $primaryKey = 'ID_USER';
    public $incrementing = false; // Set to true for auto-incrementing
    public $timestamps = false;


    // Kolom yang dapat diisi
    protected $fillable = [
        'ID_USER', 'NAMA_USER', 'USERNAME', 'password', 'email', 'NO_HP', 'WA', 'PIN',
        'ID_JENIS_USER', 'STATUS_USER', 'DELETE_MARK', 'CREATE_BY', 'CREATE_DATE',
        'UPDATE_BY', 'UPDATE_DATE',
    ];


    protected $hidden = 'password';

    public function userFoto()
    {
        return $this->hasOne(UserFoto::class, 'ID_USER', 'ID_USER');
    }

    
    // Relasi dengan tabel jenis_users (asumsikan jenis_users adalah nama tabel)
    public function jenisUser()
    {
        return $this->belongsTo(JenisUser::class, 'ID_JENIS_USER');
    }


    public function delete()
    {
        // Instead of actually deleting the record, update the DELETE_MARK column
        $this->update(['DELETE_MARK' => 0]);
    }

    protected static function booted()
    {
        static::addGlobalScope('active', function (Builder $builder) {
            $builder->where('DELETE_MARK', 1);
        });
    }
}