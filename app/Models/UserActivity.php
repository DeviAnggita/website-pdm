<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth; // Import the Auth facade

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\LogOptions;

class UserActivity extends Model
{
    use LogsActivity;

    protected $table = 'user_activity';
    protected $primaryKey = 'NO_ACTIVITY';
    public $incrementing = false; // Set to true for auto-incrementing
    public $timestamps = false; // If not using created_at and updated_at columns.

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
        $this->update(['DELETE_MARK' => 0]);
    }


    protected $guarded = [];

    protected static $logAttributes = [
        'ID_USER',
        'DISCRIPSI',
        'STATUS',
        'MENU_ID',
        'DELETE_MARK',
        'CREATE_BY',
        'CREATE_DATE',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('user_activity')
            ->logOnly(['NO_ACTIVITY','ID_USER', 'DISCRIPSI', 'STATUS', 'MENU_ID', 'DELETE_MARK', 'CREATE_BY', 'CREATE_DATE']);
    }
    

    protected static function booted()
    {
        static::addGlobalScope('active', function (Builder $builder) {
            $builder->where('DELETE_MARK', 1);
        });
        

        static::created(function ($userActivity) {
            $loggedInUser = Auth::user();

            activity()
                ->performedOn($userActivity)
                ->causedBy($loggedInUser)
                ->log('created');
        });
    }
}