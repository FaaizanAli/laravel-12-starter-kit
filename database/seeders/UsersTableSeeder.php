<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'email_verified_at' => NULL,
                'password' => '$2a$08$P9F6hB0ori5hSGh73YwlY.NVomovUcSJEM1pXd7Tc0a4RK9liMhoi',
                'remember_token' => NULL,
                'created_at' => '2025-03-10 13:20:35',
                'updated_at' => '2025-03-10 13:20:35',
            ),
        ));
        
        
    }
}