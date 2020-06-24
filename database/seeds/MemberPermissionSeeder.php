<?php

use App\Entities\Role;
use App\Entities\Permission;
use Illuminate\Database\Seeder;

class MemberPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // $role=Role::find(2); //Member
        $role=  Role::where('name','Member')->first(); //Member
        $role->givePermissionTo('Create business');
        $role->givePermissionTo('Delete business');
        $role->givePermissionTo('Update business');

        $role->givePermissionTo('List business category');
        $role->givePermissionTo('Create business category');
        



        //
    }
}
