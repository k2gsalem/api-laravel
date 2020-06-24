<?php


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ConfigBusinessCategorySeeder::class);
        $this->call(BusinessProfileSeeder::class);
        $this->call(MemberPermissionSeeder::class);
        
    }
}
