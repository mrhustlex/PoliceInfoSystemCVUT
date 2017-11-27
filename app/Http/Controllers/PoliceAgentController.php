<?php

namespace App\Http\Controllers;

use App\PoliceAgentModel;
use CreatePoliceAgentTable;
use Illuminate\Http\Request;

class PoliceAgentController extends Controller
{
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
        if($agents != null)
            return view('police_agent.index');
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

    public function getPoliceMember(){
        $agents = PoliceAgentModel::all();
        if($agents == null)
            return "No agent is in this police office";
        else
        return view('police_agent.index')->with('agents', $agents);
    }

}

