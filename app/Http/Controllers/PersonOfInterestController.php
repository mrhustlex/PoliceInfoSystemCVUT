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
        $title = ["person_id", "surname", "name", "address", "date_of_birth", "Role"];
        if($poi_list == null){
            return view('person_of_interest.index')
                ->with(['items'=> [],
                    'columnName' =>$title,
                    'case_id' => $case_id
                ]);
        }
        foreach ($poi_list[0] as $key => $value)
            array_push($column, $key);
        if($poi_list == null)
            return "Person of Interest Not associated";
//        ["person_id", "surname", "name", "address", "date_of_birth"]
        return view('person_of_interest.index')
            ->with(['items'=> $poi_list,
            'columnName' =>$column,
                'case_id' => $case_id
        ]);

    }

    public function addPersonOfInterest(Request $request){
        $case_id = $request->input('case_id');
        $name = $request->input('name', "Nil");
        $surname = $request->input('surname', "Nil");
        $address = $request->input('address', "Address Not found");
        $date =  $request->input('date', null);
        $poi = $this->poi_handler->addPersonOfInterest($case_id, $name, $surname, $address, $date);
        if($poi == null)
            return "fail to add poi";
        $poi_detail = $this->poi_handler->getPersonOfInterestDetail($poi->POILink->poi_id);
        return view('person_of_interest.detail')
            ->with($poi_detail);
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
        $suspect = $this->poi_handler->modifyPersonOfInterest($poi_id, POIHandler::TYPE_SUSPECT);
        if($suspect == null)
            return redirect()->back()->with('message', "Failed to add suspect");
        $detail = $this->poi_handler->getPersonOfInterestDetail($poi_id);
        return view('person_of_interest.detail')
            ->with($detail);
    }

    public function setWitness(Request $request){
        $poi_id = $request->input('poi_id');
        if($poi_id == null)
            return "poi_id not found";
        $witness = $this->poi_handler->modifyPersonOfInterest($poi_id, POIHandler::TYPE_WITNESS);
        if($witness == null)
            return redirect()->back()->with('message', "Failed to add witness");
        $detail = $this->poi_handler->getPersonOfInterestDetail($poi_id);
        return view('person_of_interest.detail')
            ->with($detail);
    }


    public function setCriminal(Request $request){
        $poi_id = $request->input('poi_id');
        if($poi_id == null)
            return "poi_id not found";
        $criminal = $this->poi_handler->modifyPersonOfInterest($poi_id, POIHandler::TYPE_CRIMINAL);
        if($criminal == null)
            return redirect()->back()->with('message', "Failed to add criminal");
        $detail = $this->poi_handler->getPersonOfInterestDetail($poi_id);
        return view('person_of_interest.detail')
            ->with($detail);
    }

    public function setVictim(Request $request){
        $poi_id = $request->input('poi_id');
        if($poi_id == null)
            return "poi_id not found";
        $victim = $this->poi_handler->modifyPersonOfInterest($poi_id, POIHandler::TYPE_VICTIM);
        if($victim == null)
            return redirect()->back()->with('message', "Failed to add victim");
        $detail = $this->poi_handler->getPersonOfInterestDetail($poi_id);
        return view('person_of_interest.detail')
            ->with($detail);
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
        return view('person_of_interest.detail')
            ->with($poi);
    }

    public function getPersonOfInterestAddPage(Request $request){
        $case_id = $request->input('case_id', null);
        if($case_id == null)
            return "case Id not entered";
        return view('person_of_interest.add')
            ->with([
                'case_id' => $case_id,
            ]);
    }

}
