<?php

namespace App\Http\Controllers;

use App\CaseModel;
use Carbon\Carbon;
use DateTime;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use PHPUnit\Exception;

class CaseController extends Controller
{
    public function getCaseIndex(Request $request){
        $title = $agents = null;
        $solved = $request->input('solved', false);
        try{
            if($solved == false)
                $agents = CaseModel::where('solved', "No")->orderBy(CaseModel::COL_ID, 'desc')->get();
            else
                $agents = CaseModel::where('solved', "Yes")->orderBy(CaseModel::COL_ID, 'desc')->get();
            if(CaseModel::first()!= null)
                $title  =array_keys(CaseModel::first()->toArray());
            else
                $title = Schema::getColumnListing(CaseModel::TABLE_NAME);
        }catch (Exception $e){
            echo $e->getMessage();
        }
        if($agents == null ||$title == null)
            return "No cases is in this police office";
        else
            return view('case.index')
                ->with(['items'=> $agents,
                    'columnName' => $title,
                    'id' => CaseModel::COL_ID
                ]);
    }


    public function openCase(Request $request){
        $name = $request->input(CaseModel::COL_NAME);
        $type = $request->input(CaseModel::COL_TYPE, 'Normal');
        $solved = $request->input(CaseModel::COL_SOLVED, 'No');
        $closed = $request->input(CaseModel::COL_CLOSED, "No");
        $crimeDate = $request->input(CaseModel::COL_CRIME_DATE);
        $depID = $request->input(CaseModel::COL_DEP_ID, 1);
        $oDAY = $request->input(CaseModel::COL_O_DAY);
        $description = $request->input(CaseModel::COL_DES);

        $dtime = strtotime($crimeDate);
        $time = date("Y-m-d H:i:s", $dtime);
//        echo $time;
        if($solved != 'No')
            $closed = "yes";
        $agent = new CaseModel([
            CaseModel::COL_NAME => $name,
            CaseModel::COL_TYPE => $type,
            CaseModel::COL_SOLVED => $solved,
            CaseModel::COL_CLOSED => $closed,
            CaseModel::COL_DEP_ID => $depID,
            CaseModel::COL_O_DAY => $oDAY,
            CaseModel::COL_DES => $description,
        ]);
        $agent[CaseModel::COL_CRIME_DATE] = $time;
        $agent->save();
        $agents = CaseModel::orderBy(CaseModel::COL_ID, 'desc')->get();
        if(CaseModel::first()!= null)
            $title  =array_keys(CaseModel::first()->toArray());
        else
            $title = Schema::getColumnListing(CaseModel::TABLE_NAME);
        if($agents == null ||$title == null)
            return "No cases is in this police office";
        else
            return view('case.index')
                ->with(['items'=> $agents,
                    'columnName' => $title,
                    'id' => CaseModel::COL_ID
                ]);
    }


    public function closeCase(Request $request){
        $case_id = $request->input('case_id');
        $toSolve =  $request->input('solve', false);
        $case = CaseModel::find($case_id);
        if($toSolve == true && $case != null){
            $case[CaseModel::COL_CLOSED] = "Yes";
            $case[CaseModel::COL_SOLVED] = "Yes";
            $case->save();
        }else if($case != null){
            if($case[CaseModel::COL_CLOSED] != "Yes")
                $case[CaseModel::COL_CLOSED] = "Yes";
            else
                $case[CaseModel::COL_CLOSED] = "No";
            $case->save();
        }else{
            return "case not found";
        }
        $agents = CaseModel::orderBy(CaseModel::COL_ID, 'desc')->get();
        if(CaseModel::first()!= null)
            $title  =array_keys(CaseModel::first()->toArray());
        else
            $title = Schema::getColumnListing(CaseModel::TABLE_NAME);
        if($agents == null ||$title == null)
            return "No cases is in this police office";
        else{
            return view('case.detail')->with('case', $case);
        }
    }

    public function getCaseDetail(Request $request){
        $id = $request->input('case_id');
        $case = CaseModel::find($id);
        if($case != null)
            return view('case.detail')->with('case', $case);
        else
            return "Case Not found";
    }

}
