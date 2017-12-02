<?php

use App\CaseModel;
use Illuminate\Database\Seeder;

class caseSeeder extends Seeder
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
            $agent = new CaseModel([
                CaseModel::COL_NAME => $faker->name,
                CaseModel::COL_TYPE => "Normal",
                CaseModel::COL_SOLVED => "No",
                CaseModel::COL_CLOSED => "No",
                CaseModel::COL_CRIME_DATE => $faker->time('Y-m-d H:i:s'),
                CaseModel::COL_DEP_ID => 1,
                CaseModel::COL_DES => $faker->text,
            ]);
            $agent->save();
    }


    }

}
