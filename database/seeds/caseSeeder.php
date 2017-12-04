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
            $j = random_int(0, 50);
            $agent = new CaseModel([
                CaseModel::COL_NAME => $faker->name,
                CaseModel::COL_TYPE => "Normal",
                CaseModel::COL_SOLVED => ($j%2 == 0)?"No":"Yes",
                CaseModel::COL_CLOSED => ($j%2 == 0)?"No":"Yes",
                CaseModel::COL_CRIME_DATE => $faker->time('Y-m-d H:i:s'),
                CaseModel::COL_DEP_ID => 1,
                CaseModel::COL_DES => $faker->text,
            ]);
            $agent->save();
    }


    }

}
