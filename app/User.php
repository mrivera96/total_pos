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
        'user_name',
        'user_last_name',
        'user_dni',
        'user_birthday',
        'user_register_date',
        'user_cellphone',
        'user_address',
        'user_email',
        'user_password',
        'user_nick_name',
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
