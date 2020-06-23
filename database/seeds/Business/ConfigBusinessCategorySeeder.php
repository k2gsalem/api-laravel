<?php

use App\Entities\Role;
use Illuminate\Database\Seeder;

class ConfigBusinessCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $x= factory(\App\Entities\Business\ConfigBusinessCategory::class,20)->create();
        //
    }
}
