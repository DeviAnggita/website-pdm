<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\LogOptions;

class Menu extends Model
{
    use LogsActivity;
    
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
 
  
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('menu') // Change the log name if needed
            ->logOnly([   
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
        ]);
    }
    

    protected static function booted()
    {
        static::addGlobalScope('active', function (Builder $builder) {
            $builder->where('DELETE_MARK', 1);
        });
        

        static::created(function ($menu) {
            $loggedInUser = Auth::user();

            activity()
                ->performedOn($menu)
                ->causedBy($loggedInUser)
                ->log('created');
        });
    }
}