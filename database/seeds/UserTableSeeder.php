<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	[
        		'name' 		=> 'admin',
            'username' => 'admin paket wisata',
        		'email'		=> 'admin@gmail.com',
        		'role'		=> '2',
        		'password' 	=> bcrypt('admin1'),
        		'created_at' => date('Y-m-d H:i:s'),
            	'updated_at' => date('Y-m-d H:i:s'),
        	],
        	[
        		'name' 		=> 'joko',
            'username' => 'joko',
        		'email'		=> 'joko@gmail.com',
        		'role'		=> '1',
        		'password' 	=> bcrypt('123456'),
        		'created_at' => date('Y-m-d H:i:s'),
            	'updated_at' => date('Y-m-d H:i:s'),
        	],
        	[
        		'name' 		=> 'joe',
            'username' => 'joe',
        		'email'		=> 'joe@gmail.com',
        		'role'		=> '1',
        		'password' 	=> bcrypt('123456'),
        		'created_at' => date('Y-m-d H:i:s'),
            	'updated_at' => date('Y-m-d H:i:s'),
        	],
          [
        		'name' 		=> 'pengemudi',
            'username' => 'pengemudi',
        		'email'		=> 'pengemudi@gmail.com',
        		'role'		=> '2',
        		'password' 	=> bcrypt('123456'),
        		'created_at' => date('Y-m-d H:i:s'),
            	'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);
    }
}
