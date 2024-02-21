<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\LogOptions;
use Illuminate\Support\Facades\Auth; // Import the Auth facade

class MenuLevel extends Model
{
    use LogsActivity;
    
    protected $table = 'menu_level';
    protected $primaryKey = 'ID_LEVEL';
    public $incrementing = false;
    public $timestamps = false; // Jika tidak menggunakan kolom created_at dan updated_at.
    
    // Tambahkan atribut fillable jika diperlukan.
    protected $fillable = [
        'ID_LEVEL', 
        'LEVEL',
    ];  
    
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('menuLevel') // Change the log name if needed
            ->logOnly([   
                'ID_LEVEL', 
                'LEVEL',
        ]);
    }
    

    protected static function booted()
    {
        static::created(function ($menuLevel) {
            $loggedInUser = Auth::user();

            activity()
                ->performedOn($menuLevel)
                ->causedBy($loggedInUser)
                ->log('created');
        });
    }
}