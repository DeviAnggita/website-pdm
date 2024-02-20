<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ErrorApplication extends Model
{
    use HasFactory;

    protected $table = 'i_error_application';

    protected $primaryKey = 'ERROR_ID';
    public $incrementing = false; // Set to true for auto-incrementing
    public $timestamps = false;

    protected $fillable = [
        'ERROR_ID',
        'ID_USER',
        'MODULES',
        'CONTROLLER',
        'FUNCTION',
        'ERROR_LINE',
        'ERROR_MESSAGE',
        'STATUS',
        'PARAM',
        'CREATE_DATE',
        'CREATE_TIME',
        'DELETE_MARK',
        'UPDATE_BY',
        'UPDATE_DATE',
    ];

    // Jika diperlukan, Anda dapat menambahkan relasi dengan tabel pengguna
    public function user()
    {
        return $this->belongsTo(User::class, 'ID_USER', 'ID_USER');
    }
}