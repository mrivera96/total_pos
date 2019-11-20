<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $admin = new Role();
        $admin->description    =   'Administrador';
        $admin->save();

        $cajero =   new Role();
        $cajero->description   =   'Cajero';
        $cajero->save();

        $vendedor   =   new Role();
        $vendedor->description   =    'Vendedor';
        $vendedor->save();

    }
}
