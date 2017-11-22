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
        // DB::table('users')->truncate();

    	// for ($i=0; $i < 10; $i++) { 
	        // User::create([
	        // 	// 'name' => str_random(10),
	        // 	'name'	=> 'admin',
	        //     // 'email' => str_random(10).'@gmail.com',
	        //     'email' => 'nguyenmanh0397@gmail.com',
	        //     'full_name' => 'Nguyễn Văn Mạnh',
	        //     'password' => bcrypt('123456')
	        // ]);
	    // }
        // User::create([
        //     // 'name' => str_random(10),
        //     'name'  => 'nguyenmanh',
        //     // 'email' => str_random(10).'@gmail.com',
        //     'email' => 'nguyenmanhkma@gmail.com',
        //     'full_name' => 'Nguyễn Mạnh',
        //     'password' => bcrypt('123456')
        // ]); 
        // User::create([
        //     // 'name' => str_random(10),
        //     'name'  => 'ngonghia',
        //     // 'email' => str_random(10).'@gmail.com',
        //     'email' => 'ngonghia@gmail.com',
        //     'full_name' => 'Ngô Nghĩa',
        //     'password' => bcrypt('123456')
        // ]);
        // User::create([
        //     // 'name' => str_random(10),
        //     'name'  => 'tranduc',
        //     // 'email' => str_random(10).'@gmail.com',
        //     'email' => 'tranduc@gmail.com',
        //     'full_name' => 'Trần Đức',
        //     'password' => bcrypt('123456')
        // ]);
        User::create([
            // 'name' => str_random(10),
            'name'  => 'duydu',
            // 'email' => str_random(10).'@gmail.com',
            'email' => 'duydu@gmail.com',
            'full_name' => 'Duy Dự',
            'password' => bcrypt('123456')
        ]);
    }
}
