<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Builder;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\LogOptions;

class ErrorApplication extends Model
{
    use LogsActivity;

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

    public function delete()
    {
        // Instead of actually deleting the record, update the DELETE_MARK column
        $this->update(['DELETE_MARK' => 0]);
    }
 
  
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('error_application') // Change the log name if needed
            ->logOnly([   'ERROR_ID',
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
            'UPDATE_DATE']);
    }
    

    protected static function booted()
    {
        static::addGlobalScope('active', function (Builder $builder) {
            $builder->where('DELETE_MARK', 1);
        });
        

        static::created(function ($errorApplication) {
            $loggedInUser = Auth::user();

            activity()
                ->performedOn($errorApplication)
                ->causedBy($loggedInUser)
                ->log('created');
        });
    }
}