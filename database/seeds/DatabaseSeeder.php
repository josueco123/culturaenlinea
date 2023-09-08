<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BasicDataSeeder::class);
        $this->call(CallsTableSeeder::class);
        $this->call(IncentivesTableSeeder::class);
        $this->call(FormsTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        // $this->call(ApplicationsTableSeeder::class);
        // $this->call(RegistersTableSeeder::class);
    }
}
