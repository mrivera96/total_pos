<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'users';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'last_name',
        'dni',
        'birthday',
        'register_date',
        'mobile',
        'address',
        'email',
        'password',
        'username',
        'role_id',
        'branch_id',
        'status'
    ];

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function branch(){
        return $this->belongsTo(Branch::class);
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];
}
