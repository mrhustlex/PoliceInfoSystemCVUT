<?php

namespace App\Http\Controllers;

use App\Http\IPOIHandler;
use App\Http\POIHandler;
use App\Model\CaseModel;
use Illuminate\Http\Request;
use CreatePersonOfInterestTable;

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
        $column = [];
        foreach ($poi_list[0]->toArray() as $key => $value)
            array_push($column, $key);
        if($poi_list == null)
            return "Person of Interest Not associated";
//        ["person_id", "surname", "name", "address", "date_of_birth"]
        return view('person_of_interest.index')
            ->with(['items'=> $poi_list,
            'columnName' =>$column
        ]);

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

    public function getTestimony(Request $request){
        $poi_id = $request->input('poi_id');
        $testimony = $this->poi_handler->getTestimony($poi_id);
        if($testimony == null)
            return "POI not exist";
        return $testimony;
    }

    public function setSuspect(Request $request){
        $poi_id = $request->input('poi_id');
        if($poi_id == null)
            return "poi_id not found";
        return $this->poi_handler->modifyPersonOfInterest($poi_id, POIHandler::TYPE_SUSPECT);
    }

    public function setWitness(Request $request){
        $poi_id = $request->input('poi_id');
        if($poi_id == null)
            return "poi_id not found";
        return $this->poi_handler->modifyPersonOfInterest($poi_id, POIHandler::TYPE_WITNESS);
    }

    public function setCriminal(Request $request){
        $poi_id = $request->input('poi_id');
        if($poi_id == null)
            return "poi_id not found";
        return $this->poi_handler->modifyPersonOfInterest($poi_id, POIHandler::TYPE_CRIMINAL);
    }

    public function setVictim(Request $request){
        $poi_id = $request->input('poi_id');
        if($poi_id == null)
            return "poi_id not found";
        return $this->poi_handler->modifyPersonOfInterest($poi_id, POIHandler::TYPE_VICTIM);
    }

    public function getRole(Request $request){
        $poi_id = $request->input('poi_id');
        if($poi_id == null)
            return "poi_id not found";
        return $this->poi_handler->getPersonOfInterestRole($poi_id);
    }

    public function getPersonOfInterestDetail(Request $request){
        if($request == null)
            return redirect()->back()->with('message', "Failed to get detail");
        $poi_id = $request->input("poi_id");
        $poi = $this->poi_handler->getPersonOfInterestDetail($poi_id);
        if($poi == null)
            return redirect()->back()->with('message', "Failed to get POI");
        $roles = $this->poi_handler->getPersonOfInterestRole($poi_id);
        return view('person_of_interest.detail')
            ->with([
                'poi' => $poi,
                'roles'=> $roles
            ]);
    }



}
