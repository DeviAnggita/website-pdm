<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class UserActivity extends Model
{
    protected $table = 'user_activity';
    protected $primaryKey = 'NO_ACTIVITY';
    public $incrementing = false; // Set to true for auto-incrementing
    public $timestamps = false; // Jika tidak menggunakan kolom created_at dan updated_at.
    
    // Tambahkan atribut fillable jika diperlukan.
    protected $fillable = [
        'NO_ACTIVITY',
        'ID_USER',
        'DISCRIPSI',
        'STATUS',
        'MENU_ID',
        'DELETE_MARK',
        'CREATE_BY',
        'CREATE_DATE',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'ID_USER', 'ID_USER');
    }

    
    public function menu()
    {
        return $this->belongsTo(Menu::class, 'MENU_ID', 'MENU_ID');
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