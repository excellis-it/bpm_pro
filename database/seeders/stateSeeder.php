<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\State;

class stateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $array = [
            'Alabama','Alaska','Arizona','Arkansas','California','Colorado','Connecticut','Delaware','District of Columbia','Florida',
            'Georgia','Hawaii','Idaho','Illinois','Indiana','Iowa','Kansas','Kentucky','Louisiana','Maine','Montana','Nebraska','Nevada',
            'New Hampshire','New Jersey','New Mexico','New York','North Carolina','North Dakota','Ohio','Oklahoma','Oregon','Maryland',
            'Massachusetts','Michigan','Minnesota','Mississippi','Missouri','Pennsylvania','Rhode Island','South Carolina','South Dakota',
            'Tennessee','Texas','Utah','Vermont','Virginia','Washington','West Virginia','Wisconsin','Wyoming'
            
        ];

        for ($i=0; $i < count($array) ; $i++) { 
            $state = new State();
            $state->name = $array[$i];
            $state->save();
        }
    }
}
