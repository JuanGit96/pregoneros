<?php

use App\Campaign;
use Illuminate\Database\Seeder;

class CampaignsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Campaign::create([
            'object' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'code' => 'TC',
            'budget' => '50.000',
            'scope' => '50000',
            'client_id' => 1
        ]);


        Campaign::create([
            'object' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'code' => 'TC',
            'budget' => '50.000',
            'scope' => '50000',
            'client_id' => 2
        ]);


        Campaign::create([
            'object' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'code' => 'CC',
            'budget' => '50.000',
            'scope' => '50000',
            'client_id' => 3
        ]);
    }
}
