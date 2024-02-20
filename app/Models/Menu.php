<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Menu extends Model
{
    protected $table = 'menu';
    protected $primaryKey = 'MENU_ID';
    public $incrementing = false;
    public $timestamps = false; // Jika tidak menggunakan kolom created_at dan updated_at.

    // Tambahkan atribut fillable jika diperlukan.
    protected $fillable = [
        'MENU_ID', 
        'ID_LEVEL',
        'MENU_NAME',
        'MENU_LINK',
        'MENU_ICON',
        'PARENT_ID',
        'CREATE_BY',
        'CREATE_DATE',
        'DELETE_MARK',
        'UPDATE_BY',
        'UPDATE_DATE',
    ];

    public function level()
    {
        return $this->belongsTo(MenuLevel::class, 'ID_LEVEL', 'ID_LEVEL');
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