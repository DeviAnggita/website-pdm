<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuLevel extends Model
{
    protected $table = 'menu_level';
    protected $primaryKey = 'ID_LEVEL';
    public $incrementing = false;
    public $timestamps = false; // Jika tidak menggunakan kolom created_at dan updated_at.
    
    // Tambahkan atribut fillable jika diperlukan.
    protected $fillable = [
        'ID_LEVEL', 
        'LEVEL',
    ];
}