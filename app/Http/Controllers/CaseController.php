<?php

namespace App\Http\Controllers;

use App\Http\CaseDAO;
use App\Http\caseHandler;
use App\CaseModel;
use App\Http\ICaseHandler;
use Carbon\Carbon;
use DateTime;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use PHPUnit\Exception;
use Symfony\Component\HttpFoundation\Session\Session;

class CaseController extends Controller
{

    private $caseHandler;

    /**
     * CaseController constructor.
     * @param $caseHandler
     */
    public function __construct(ICaseHandler $caseHandler)
    {
        $this->caseHandler = $caseHandler;
    }

    public function getCaseIndex(Request $request){
        $sortBy = $request->input("sort", CaseModel::COL_ID);
        $order = $request->input("order", 'desc');
        $type =  $request->input("type", CaseDAO::UNSOLVED_CASE);
//        $caseHandler = new caseHandler();
        $cases = $this->caseHandler->getCaseList($sortBy, $order, $type);
        if($cases == null)
            return "No cases is in this police office";
        if(CaseModel::first()!= null)
            $title  =array_keys(CaseModel::first()->toArray());
        else
            $title = Schema::getColumnListing(CaseModel::TABLE_NAME);
        if($title == null)
            return "No such database Table";

            return view('case.index')
                ->with(['items'=> $cases,
                    'columnName' => $title,
                    'id' => CaseModel::COL_ID
                ]);
    }


    public function openCase(Request $request){
        if($request == null)
            return null;
        $name = $request->input(CaseModel::COL_NAME);
        $type = $request->input(CaseModel::COL_TYPE, 'Normal');
        $solved = $request->input(CaseModel::COL_SOLVED, 0);
        $closed = $request->input(CaseModel::COL_CLOSED, 0);
        $crimeDate = $request->input(CaseModel::COL_CRIME_DATE);
        $depID = $request->input(CaseModel::COL_DEP_ID, 1);
        $oDAY = $request->input(CaseModel::COL_O_DAY);
        $description = $request->input(CaseModel::COL_DES);
        $dtime = strtotime($crimeDate);
        $time = date("Y-m-d H:i:s", $dtime);

        if($name == null||$type== null|| $solved == null || $closed==null
            || $depID == null||$description==null ){
            return $request;
        }


//        $caseHandler = new caseHandler();
        $caseAdded = $this->caseHandler->addCase($name, $type, $solved, $closed, $crimeDate, $depID, $oDAY, $description, $time);
        if($caseAdded == null)
            return redirect()->back()->with('message', "Failed to add case");
        else{
            echo "Added case successfully";
            return self::getCaseIndex($request);
        }
    }

    public function reopenClosedCase(Request $request){
        $id = $request->input(CaseModel::COL_ID);
//        $caseHandler = new caseHandler();
        $caseReopened = $this->caseHandler->openCase($id);
        if($caseReopened == null){
            return $request;
//            return redirect()->back()->with('message', "Failed to close case");
        }
        return view('case.detail')->with('case', $caseReopened);
    }

    public function closeCase(Request $request){
        $id = $request->input(CaseModel::COL_ID);
//        $caseHandler = new caseHandler();
        $caseClosed = $this->caseHandler->closeCase($id, true);
        if($caseClosed == null){
            return redirect()->back()->with('message', "Failed to close case");
        }
        return view('case.detail')->with('case', $caseClosed);

    }
    public function solveCase(Request $request){
        $id = $request->input(CaseModel::COL_ID);
//        $caseHandler = new caseHandler();
        $caseSolved = $this->caseHandler->solveCase($id);
        if($caseSolved == null){
            return redirect()->back()->with('message', "Failed to solve case");
        }
        return view('case.detail')->with('case', $caseSolved);

    }

    public function getCaseDetail(Request $request){
        if($request == null)
            return redirect()->back()->with('message', "Failed to get case");
        $caseID = $request->input(CaseModel::COL_ID);
//        $caseHandler = new caseHandler();
        $case = $this->caseHandler->getCase($caseID);
        if($case == null)
            return redirect()->back()->with('message', "Failed to get case");
        return view('case.detail')->with('case', $case);
    }

}
