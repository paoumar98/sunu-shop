<?php

use App\AdminUser;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdminUser::create([
            'name' => 'Admin',
            'email' => 'papou@shop.com',
            'password' => bcrypt('passer123')
        ]);
    }
}
