<?php

namespace App\Http\Controllers;

use App\Http\IPoliceAgentHandler;
use App\Http\PoliceAgentHandler;
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

    
    public function getCaseIndex(Request $request){
        $sortBy = $request->input("sort", CaseModel::COL_ID);
        $order = $request->input("order", 'desc');
        $type =  $request->input("type", CaseDAOHandler::UNSOLVED_CASE);
        $cases = $this->caseHandler->getCaseList($sortBy, $order, $type);
        if($cases == null)
            return "No cases is in this police office";
        $title = $this->caseHandler->getCaseTitle();
        if($title == null)
            return "No such database Table";

            return view('case.index')
                ->with(['items'=> $cases,
                    'columnName' => $title,
                    'id' => CaseModel::COL_ID
                ]);
    }
    

    
    public function getPoliceAgentDetail(Request $request){
        if($request == null)
            return redirect()->back()->with('message', "Failed to get detail");

        $policeAgent_id = $request->input("policeAgent_id");
        $policeAgent = $this->policeAgent_handler->getPoliceAgentDetail($policeAgent_id);

        if($policeAgent == null)
            return redirect()->back()->with('message', "Failed to get PoliceAgent");

        return view('police_agent.detail')
            ->with([
                'policeAgent' => $policeAgent,
            ]);
    }

    public function addPoliceAgent(Request $request){
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

