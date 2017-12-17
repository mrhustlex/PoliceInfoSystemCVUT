<?php

namespace App\Http\Controllers;

use App\Http\IPOIHandler;
use App\Model\CaseModel;
use Carbon\Carbon;
use CreatePersonOfInterestTable;
use Illuminate\Http\Request;

class PersonOfInterestController extends Controller
{
    private $poi_handler;

    /**
     * PersonOfInterestController constructor.
     * @param $poi_handler
     */
    public function __construct(IPOIHandler $poi_handler)
    {
        $this->poi_handler = $poi_handler;
    }

    public function getPersonOfInterestList(Request $request){
        $case_id = $request->input('case_id', null);
        if($case_id == null)
            return "Lack of case Id";

        $poi_list = $this->poi_handler->getPersonOfInterest($case_id);
        echo $poi_list;
        if($poi_list == null)
            return "Person of Interest Not associated";

        return view('person_of_interest.index');

    }

    public function addPersonOfInterest(Request $request){
        $case_id = $request->input('case_id');
        $name = $request->input('name', "Name");
        $surname = $request->input('surname', "Surname");
        $address = $request->input('address', "Add");
        $date =  $request->input('date', null);
        $poi = $this->poi_handler->addPersonOfInterest($case_id, $name, $surname, $address, $date);
        if($poi == null)
            return "fail to add poi";
        return $poi;
    }


    public function addTestimony(Request $request){
        $poi_id = $request->input('poi_id');
        $type = $request->input('type', "Undefined");
        $date = $request->input('date', "Nil");
        $statement = $request->input('statement', "Nil");
        $testimony = $this->poi_handler->addTestimony($poi_id, $type, $date, $statement);
        if($testimony == null)
            return "POI not exist";
        return $testimony;
    }
}
