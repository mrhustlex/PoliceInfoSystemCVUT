<?php

namespace App\Http\Controllers;

use App\PoliceAgentModel;
use CreatePoliceAgentTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Mockery\Exception;

class PoliceAgentController extends Controller
{
    public function getPoliceMemberIndex(){
        $title = $agents = null;
        try{
            $agents = PoliceAgentModel::all();
            $title  =array_keys(PoliceAgentModel::first()->toArray());
//            $columns = Schema::getColumnListing(PoliceAgentModel::TABLE_NAME);
        }catch (Exception $e){
            echo $e->getMessage();
        }
        if($agents == null ||$title == null)
            return "No agent is in this police office";
        else
            return view('police_agent.index')
                ->with(['items'=> $agents,
                    'columnName' => $title,
                    'id' => PoliceAgentModel::COL_ID
                ]);
    }

    public function addPoliceMember(Request $request){
        $police_name = $request->input(PoliceAgentModel::COL_NAME, "peter");
        $position = $request->input(PoliceAgentModel::COL_POS, "head");
        if($police_name == null or $position == null) {
            return 'NAME_OR_POSITION_NOT_FOUND';
        }
        $agent = new PoliceAgentModel([
            PoliceAgentModel::COL_NAME => $police_name,
            PoliceAgentModel::COL_POS => $position
        ]);
        $agent->save();
        $agents = PoliceAgentModel::all();
        if($agents == null)
            return "No agents";

        return view('police_agent.index')
                ->with(['items'=> $agents,
                'columnName' => array_keys(PoliceAgentModel::first()->toArray()),
                'id' => PoliceAgentModel::COL_ID
            ]);
    }

    public function deletePoliceMember(Request $request){
        $police_id = $request->input(PoliceAgentModel::COL_ID);
        $police_obj = PoliceAgentModel::find($police_id);
        if($police_obj != null && !$police_obj->trashed()){
            $police_obj->delete();
        }else
            return 'POLICE_NOT_FOUND';

    }
    public function modifyPoliceMember(){

    }



    public function getPoliceInformation(Request $request){
        $police_id = $request->input(PoliceAgentModel::COL_ID);
        if($police_id != null &&  $police_id > 0){
            $agent = PoliceAgentModel::find($police_id);
            return view('police_agent.personDetail')->with('agent', $agent);
        }
        return "No such User";

    }

}

