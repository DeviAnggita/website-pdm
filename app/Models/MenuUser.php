<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class MenuUser extends Model
{
    use HasFactory;

    protected $table = 'menu_user';

    protected $primaryKey = 'NO_SETTING';
    public $incrementing = false;
    public $timestamps = false; // Jika tidak menggunakan kolom created_at dan updated_at.
    
    protected $fillable = [
        'NO_SETTING',
        'ID_USER',
        'MENU_ID',
        'CREATE_DATE',
        'CREATE_TIME',
        'DELETE_MARK',
        'UPDATE_BY',
        'UPDATE_DATE',
    ];

    // Jika diperlukan, Anda dapat menambahkan relasi dengan tabel pengguna dan menu
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