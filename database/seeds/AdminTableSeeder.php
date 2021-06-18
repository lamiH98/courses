<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::insert([
            'name'      => 'lami',
            'email'     => 'lami@admin.com',
            'password'  => bcrypt(123123),
            'role'      => 'admin'
        ]);
    }
}
