<?php

use App\PoliceAgentModel;
use Illuminate\Database\Seeder;

class policeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker\Factory::create();
        for($i = 0; $i<10; $i++){
            $agent = new PoliceAgentModel([
                PoliceAgentModel::COL_NAME => $faker->name,
                PoliceAgentModel::COL_POS => "Police Officer"
            ]);
            $agent->save();
        }


    }
}
