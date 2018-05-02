<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username', 'access_level', 'is_enabled'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $dates = ['deleted_at'];


    public function categories(){
        return $this->hasMany('App\Category', 'assign_to');
    }

    public function issues(){
        return $this->hasMany('App\Issues', 'assigned_to')->hasMany('App\Issues', 'reporter');
    }
    public function isSuperAdmin(){
        return $this->access_level==='administrator';
    }
    // public function getStatusIconClassAttribute(){
    //     switch ($this->is_enabled) {
    //         case '1':
    //             # code...
    //             break;
            
    //         default:
    //             # code...
    //             break;
    //     }
    // }
}
