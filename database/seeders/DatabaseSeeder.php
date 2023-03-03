<?php

namespace Database\Seeders;
use App\Models\Admin;
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
        // \App\Models\User::factory(10)->create();
        $admin = new Admin();
        $admin->name = 'Amin';
        $admin->email = 'admin@gmail.com';
        $admin->password = bcrypt(12345678);
        $admin->save();


    }
}
