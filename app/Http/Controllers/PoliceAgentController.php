<?php
namespace App\Http\Controllers;
use App\Http\IPoliceAgentHandler;
use App\Http\PoliceAgentHandler;
use App\Http\Requests\CreatePoliceAgentRequest;
use App\Model\PoliceAgentModel;
use Illuminate\Http\Request;
use CreatePoliceAgent;
use Illuminate\Support\Facades\Hash;

/**
 * Implements the presentation layer for the management of the Police Agents
 *
 */
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

    /**
     * Handles the view of the list of police Agents
     * @param $request
     */
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
//
    }


    /**
     * Handles the view designed to allow an user to add a police Agent to the system
     * @param $request
     */
    public function addPoliceMemberIndex(Request $request){
        $places = $this->policeAgent_handler->getDepartmentStationList();
        return view('police_agent.add')->with([
            'places' => $places
        ]);
    }

    /**
     * Prcesses the information received by an user trying to add a police Agent to the system
     * @param $request
     */
    public function addPoliceAgent(CreatePoliceAgentRequest $request){
        $surname = $request->input('surname');
        $name = $request->input('name');
        $address = $request->input('address');
        $dob = $request->input('date_of_birth');
        $username = $request->input('username');
        $password = Hash::make($request->input('password'));
        $department = $request->input('department');
        $type = $request->input('type');
        $personAdded = $this->policeAgent_handler->addPoliceAgent($name, $surname, $address, $dob, $username, $password, $department, $type);
        if($personAdded == null)
            return redirect()->back()->with('message', "Failed to add Agent");
        else{
            echo "Added agent successfully";
            return self::getPoliceMemberIndex($request);
        }
    }

    /**
     * Changes the role of a police Agent
     * @param $request
     */
    public function setOfficer(Request $request){
        $policeAgent_id = $request->input("policeAgent_id");
        if($policeAgent_id == NULL)
            return NULL;
        return $this->policeAgent_Handler->modifyRolePoliceAgent($policeAgent_id, PoliceAgentController::TYPE_OFFICER);
    }

    /**
     * Sets the role of a police Agent to Crime Scene Investigator
     * @param $request
     */
    public function setInvestigator(Request $request){
        $policeAgent_id = $request->input("policeAgent_id");
        if($policeAgent_id == NULL)
            return NULL;
        return $this->policeAgent_Handler->modifyRolePoliceAgent($policeAgent_id, PoliceAgentController::TYPE_INVESTIGATOR);
    }

    /**
     * Sets the role of a police Agent to Detective
     * @param $request
     */
    public function setDetective(Request $request){
        $policeAgent_id = $request->input("policeAgent_id");
        if($policeAgent_id == NULL)
            return NULL;
        return $this->policeAgent_Handler->modifyRolePoliceAgent($policeAgent_id, PoliceAgentController::TYPE_DETECTIVE);
    }

    /**
     * Sets the role of a police Head of Department
     * @param $request
     */
    public function setHeadDpt(Request $request){
        $policeAgent_id = $request->input("policeAgent_id");
        if($policeAgent_id == NULL)
            return NULL;
        return $this->policeAgent_Handler->modifyRolePoliceAgent($policeAgent_id, PoliceAgentController::TYPE_HEADDPT);
    }

    /**
     * Sets the role of a police Chief of Police
     * @param $request
     */
    public function setChiefPolice(Request $request){
        $policeAgent_id = $request->input("policeAgent_id");
        if($policeAgent_id == NULL)
            return NULL;
        return $this->policeAgent_Handler->modifyRolePoliceAgent($policeAgent_id, PoliceAgentController::TYPE_CHIEF);
    }
}
