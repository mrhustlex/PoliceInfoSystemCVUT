<?php

namespace App\Http\Controllers;

use App\Http\IPoliceAgentHandler;
use App\Http\PoliceAgentHandler;
use App\Http\Requests\CreatePoliceAgentRequest;
use App\Model\PoliceAgentModel;
use Illuminate\Http\Request;
use CreatePoliceAgent;

class PoliceAgentController extends Controller
{
    private $policeAgent_handler;

    /**
     * PoliceAgentController constructor.
     * @param $policeAgent_handler
     */
    public function __construct(IPoliceAgentHandler $policeAgent_handler)
    {
        $this->policeAgent_handler = $policeAgent_handler;
    }

    
    public function getPoliceMemberIndex(Request $request){
        $type = $request->input('type');
        $policeAgents = $this->policeAgent_handler->getPoliceAgentList($type);
        if($policeAgents == null){
            return "No Agents found in the database";
        } else {
            $details = array();
            $i = 0;
            foreach ($policeAgents as $agent) {
                $detail = $this->policeAgent_handler->getPoliceAgentDetail($agent["policeAgent_id"], $type);
                if($detail != NULL){
                    $details[$i] = $detail;
                    $i++;
                }
            }
            if(count($details) != 0){
                $columnNames = array_keys($details[0]);
            } else {
                $columnNames = [
                    "surname",
                    "name",
                    "address",  
                    "username",
                    "department",
                    "policeStation",
                    "role"
                ];
            }
        }


        return view('police_agent.index')
            ->with([
                'items'=> $details,
                'columnNames' => $columnNames,
                'id' => PoliceAgentModel::COL_ID
            ]);
 
    }
    
    public function addPoliceMemberIndex(Request $request){
        $places = $this->policeAgent_handler->getDepartmentStationList();
        return view('police_agent.add')->with([
            'places' => $places
        ]);
    }

    
    public function getPoliceAgentDetail(Request $request){
        if($request == null)
            return redirect()->back()->with('message', "Failed to get detail");

        $policeAgent_id = $request->input("policeAgent_id");
        $policeAgent = $this->policeAgent_handler->getPoliceAgentDetail($policeAgent_id);

        if($policeAgent == null)
            return redirect()->back()->with('message', "Failed to get PoliceAgent");

       /* return view('police_agent.detail')
            ->with([
                'policeAgent' => $policeAgent,
            ]);
        */
    }

    public function addPoliceAgent(CreatePoliceAgentRequest $request){
        $department_id = $request->input('department_id');
        $name = $request->input('name',"name");
        $surname = $request->input('surname',"surname");
        $address = $request->input('address',"address");
        $date = $request->input('date',"date");
        $usr = $request->input('usr',"usr");
        $pwd = $request->input('pwd',"pwd");

        $policeAgent = $this->policeAgent_Handler->addPoliceAgent($department_id,$name, $surname, $address, $date, $usr, $pwd);

        if($policeAgent == NULL)
            return "failure to add police agent";

        return $policeAgent;
    }

    public function setOfficer(Request $request){
        $policeAgent_id = $request->input("policeAgent_id");
        if($policeAgent_id == NULL)
            return NULL;

        return $this->policeAgent_Handler->modifyRolePoliceAgent($policeAgent_id, PoliceAgentController::TYPE_OFFICER);
    }

    public function setInvestigator(Request $request){
        $policeAgent_id = $request->input("policeAgent_id");
        if($policeAgent_id == NULL)
            return NULL;

        return $this->policeAgent_Handler->modifyRolePoliceAgent($policeAgent_id, PoliceAgentController::TYPE_INVESTIGATOR);
    }

    public function setDetective(Request $request){
        $policeAgent_id = $request->input("policeAgent_id");
        if($policeAgent_id == NULL)
            return NULL;

        return $this->policeAgent_Handler->modifyRolePoliceAgent($policeAgent_id, PoliceAgentController::TYPE_DETECTIVE);
    }

    public function setHeadDpt(Request $request){
        $policeAgent_id = $request->input("policeAgent_id");
        if($policeAgent_id == NULL)
            return NULL;

        return $this->policeAgent_Handler->modifyRolePoliceAgent($policeAgent_id, PoliceAgentController::TYPE_HEADDPT);
    }

    public function setChiefPolice(Request $request){
        $policeAgent_id = $request->input("policeAgent_id");
        if($policeAgent_id == NULL)
            return NULL;

        return $this->policeAgent_Handler->modifyRolePoliceAgent($policeAgent_id, PoliceAgentController::TYPE_CHIEF);
    }


}

