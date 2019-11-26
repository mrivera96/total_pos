<?php

use Illuminate\Database\Seeder;
use App\User;
use Carbon\Carbon;
use App\Role;
use App\Branch;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newUser = new User();
        $newUser->name        =   'Super';
        $newUser->last_name    =   'Admin';
        $newUser->username    =   'admin';
        $newUser->avatar      =     'avatar5.png';
        $newUser->dni          =   '0703199076139';
        $newUser->birthday     =   Carbon::create(1996,11, 29);
        $newUser->register_date=   Carbon::now();
        $newUser->mobile    =   31257901;
        $newUser->address      =   'Bo. Abajo';
        $newUser->email        =   'admin@smartec.com';
        $newUser->password     =   bcrypt('admin19');
        $newUser->role_id           =   1;
        $newUser->branch_id         =   1;
        $newUser->status         =   1;
        $newUser->save();

        $salesman = new User();
        $salesman->name        =   'Salesman1';
        $salesman->last_name    =   'salesman';
        $salesman->username    =   'salesman';
        $newUser->avatar      =     'avatar3.png';
        $salesman->dni          =   '0703199307904';
        $salesman->birthday     =   Carbon::create(1996,11, 29);
        $salesman->register_date=   Carbon::now();
        $salesman->mobile    =   98989898;
        $salesman->address      =   'Bo. Barrio abajo';
        $salesman->email        =   'salesman@smartec.com';
        $salesman->password     =   bcrypt('salesman19');
        $salesman->role_id           =   3;
        $salesman->branch_id         =   1;
        $salesman->status         =   1;
        $salesman->save();

    }
}
