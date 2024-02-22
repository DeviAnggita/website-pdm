<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth; // Import the Auth facade
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Traits\HasRoles;
// use Spatie\Activitylog\LogOptions;


class UserFoto extends Model
{

    use  HasFactory ;
    
    
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


    
    public function delete()
    {
        // Instead of actually deleting the record, update the DELETE_MARK column
        $this->update(['DELETE_MARK' => 0]);
    }
 
  
    // public function getActivitylogOptions(): LogOptions
    // {
    //     return LogOptions::defaults()
    //         ->useLogName('user_foto') // Change the log name if needed
    //         ->logOnly([    
    //         'NO_FOTO',
    //         'ID_USER',
    //         'FOTO',
    //         'CREATE_BY',
    //         'CREATE_DATE',
    //         'DELETE_MARK',
    //         'UPDATE_BY',
    //         'UPDATE_DATE',]);
    // }
    

    // protected static function booted()
    // {
    //     static::addGlobalScope('active', function (Builder $builder) {
    //         $builder->where('DELETE_MARK', 1);
    //     });
        

    //     static::created(function ($userFoto) {
    //         $loggedInUser = Auth::user();

    //         activity()
    //             ->performedOn($userFoto)
    //             ->causedBy($loggedInUser)
    //             ->log('created');
    //     });
    // }
}