<?php

use App\Pregon;
use App\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Nicolas',
            'email' => 'admin@pregoneros.com',
            'lastName' => 'González',
            'dateBirth' => '1990-10-11',
            'phone' => '3005254584',
            'password' => bcrypt('qwert'),
            'role_id' => 2
        ]);

        User::create([
            'name' => 'Testeo Tecnologia',
            'email' => 'test@it.com',
            'lastName' => 'it',
            'dateBirth' => '1990-10-11',
            'phone' => '3005254584',
            'password' => bcrypt('123456'),
            'role_id' => 1
        ]);
    }
}
