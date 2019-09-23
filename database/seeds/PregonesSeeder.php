<?php

use App\Pregon;
use Illuminate\Database\Seeder;

class PregonesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pregon::create([
            'identificador_pregon' => 'T-1',
            'beneficio_redime' => 'te ganas el 50% en tu primer pedido',
            'objetivo' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'pago' => '500',
            'fecha_limite' => '2019-12-12',
            'pregon' => 'Debes hablar sobre esta nueva plataforma y sus tres
modalidades: Domicilio de comida casera, chefs a
domicilio, o cena en la casa del chef.',
            'experiencia' => 'Deberas leer los siguientes links:
http://unbouncepages.com/hofocomensales/
https://www.facebook.com/casacomidass/',
            'evidencia' => 'Tienes que tomar una foto y bla bla bla bla',
            'evidencia_camps' => '_audio_foto',
            'campaign_id' => 1
        ]);


        Pregon::create([
            'identificador_pregon' => 'TC-1',
            'beneficio_redime' => 'te ganas el 50% en tu primer pedido',
            'objetivo' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'pago' => '500',
            'fecha_limite' => '2019-12-12',
            'pregon' => 'Debes hablar sobre esta nueva plataforma y sus tres
modalidades: Domicilio de comida casera, chefs a
domicilio, o cena en la casa del chef.',
            'experiencia' => 'Deberas leer los siguientes links:
http://unbouncepages.com/hofocomensales/
https://www.facebook.com/casacomidass/',
            'evidencia' => 'Tienes que tomar una foto y bla bla bla bla',
            'evidencia_camps' => '_audio_foto',
            'campaign_id' => 2
        ]);


        Pregon::create([
            'identificador_pregon' => 'CC-1',
            'beneficio_redime' => 'te ganas el 50% en tu primer pedido',
            'objetivo' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'pago' => '600',
            'fecha_limite' => '2019-12-12',
            'pregon' => 'Debes hablar sobre esta nueva plataforma y sus tres
modalidades: Domicilio de comida casera, chefs a
domicilio, o cena en la casa del chef.',
            'experiencia' => 'Deberas leer los siguientes links:
http://unbouncepages.com/hofocomensales/
https://www.facebook.com/casacomidass/',
            'evidencia' => 'Tienes que tomar una foto y bla bla bla bla',
            'evidencia_camps' => '_audio_foto',
            'campaign_id' => 3
        ]);
    }
}
