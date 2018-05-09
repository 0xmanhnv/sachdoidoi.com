<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            // 'name' => str_random(10),
            'name'  => 'duydu',
            // 'email' => str_random(10).'@gmail.com',
            'email' => 'duydu@gmail.com',
            'full_name' => 'Duy Dự',
            'password' => bcrypt('123456')
        ]);

        User::create([
            'name'  => 'admin',
            'email' => 'nguyenmanh0397@gmail.com',
            'full_name' => 'Nguyễn Văn Mạnh',
            'is_admin' => 1,
            'password' => bcrypt('123456')
        ]);
    }
}
