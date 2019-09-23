<?php

use App\Client;
use Illuminate\Database\Seeder;

class ClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::create([
            'razon_social' => 'Tostao S.A.',
            'nit' => '85854-858-969',
            'email' => 'tostao@contacto.com',
            'telefono' => '305252159',
            'web' => 'tostao.com.co',
            'indicativo' => 'T'
        ]);


        Client::create([
            'razon_social' => 'Tus Cajas S.A.',
            'nit' => '9874-858-564',
            'email' => 'tuscajas@contacto.com',
            'telefono' => '305252159',
            'web' => 'tostao.com.co',
            'indicativo' => 'TC'
        ]);


        Client::create([
            'razon_social' => 'Cine Colombia S.A.',
            'nit' => '65421-987-951',
            'email' => 'cc@contacto.com',
            'telefono' => '3005847895',
            'web' => 'cc.com.co',
            'indicativo' => 'CC'
        ]);
    }
}
