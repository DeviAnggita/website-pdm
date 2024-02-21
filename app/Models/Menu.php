<?php

namespace App\Models;
use App\Models\ErrorApplication;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\LogOptions;
use Illuminate\Support\Facades\Auth; // Import the Auth facade

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

        static::saving(function ($menu) {
            try {
                // Lakukan operasi yang mungkin menyebabkan kesalahan di sini
            } catch (\Exception $exception) {
                // Tangkap kesalahan dan simpan ke tabel I_ERROR_APPLICATION
                $errorLog = new ErrorApplication([
                    'ID_USER' => Auth::user(),
                    'MODULES' => 'MENU', // Ganti dengan nama modul yang sesuai
                    'CONTROLLER' => 'MENU', // Ganti dengan nama controller yang sesuai
                    'FUNCTION' => 'MENU', // Ganti dengan nama fungsi yang sesuai
                    'ERROR_LINE' => $exception->getLine(),
                    'ERROR_MESSAGE' => $exception->getMessage(),
                    'STATUS' => 'NEW', // Sesuaikan dengan kebutuhan Anda
                    'PARAM' => 'AdditionalParams', // Sesuaikan dengan kebutuhan Anda
                    'CREATE_DATE' => now()->toDateString(),
                    'CREATE_TIME' => now(),
                    'DELETE_MARK' => 'N', // Sesuaikan dengan kebutuhan Anda
                    'UPDATE_BY' => Auth::user(),
                    'UPDATE_DATE' => now(),
                ]);

                $errorLog->save();

                // Throw kembali kesalahan untuk tetap memprosesnya (atau Anda dapat menanganinya sesuai kebutuhan)
                throw $exception;
            }
        });
    
    }
}