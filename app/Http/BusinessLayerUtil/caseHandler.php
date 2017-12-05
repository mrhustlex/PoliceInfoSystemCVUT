<?php


namespace App\Http;
use App\CaseModel;
use App\Http\ICaseHandler;
use Illuminate\Http\Request;


/**
 * It provides implementation of ICaseHandler(interface).
 * @author YuJin
 * @version 1.0
 * @created 05-Dec-2017 1:43:45 PM
 */
class caseHandler implements ICaseHandler
{
    const UNSOLVED_CASE = 0;
    const SOLVED_CASE = self::UNSOLVED_CASE + 1;
    const CLOSE_CASE = self::SOLVED_CASE + 1;
    private static $typeArr = [
        self::UNSOLVED_CASE => CaseModel::COL_SOLVED,
        self::SOLVED_CASE => CaseModel::COL_SOLVED,
        self::CLOSE_CASE => CaseModel::COL_CLOSED,
    ];

	function __construct()
	{
	}

	function __destruct()
	{
	}



	/**
	 * 
	 * @param id
	 */
	public function addCase($name, $type, $solved, $closed, $crimeDate, $depID, $oDAY, $description, $time)
	{

        if($solved == '1')
            $closed = 1;

        $case = new CaseModel([
            CaseModel::COL_NAME => $name,
            CaseModel::COL_TYPE => $type,
            CaseModel::COL_SOLVED => $solved,
            CaseModel::COL_CLOSED => $closed,
            CaseModel::COL_DEP_ID => $depID,
            CaseModel::COL_O_DAY => $oDAY,
            CaseModel::COL_DES => $description,
        ]);
        $case[CaseModel::COL_CRIME_DATE] = $time;
        $case->save();
        if($case == null)
            return null;
        else
            return $case;
	}

	public function editCase($name, $type, $solved, $closed, $crimeDate, $depID, $oDAY, $description, $time)
	{
	    return true;
	}

	/**
	 * 
	 * @param id
	 */
	public function getCase(int $id)
	{
        $case = CaseModel::find($id);
        if($case == Null)
            return Null;
        return $case;
	}

	public function getCaseList($sortBy, $order, $type = self::UNSOLVED_CASE)
	{
        $val = ($type == self::UNSOLVED_CASE)? 0: 1;
        $cases = CaseModel::where(self::$typeArr[$type], $val)->orderBy($sortBy, $order)->get();
        if($cases == null)
            return null;
        return $cases;

	}

    public function closeOrOpenCase($id, bool $isClose)
    {
        $case = CaseModel::find($id);
        if($case == null)
            return null;
        if($isClose)
            $case[CaseModel::COL_CLOSED] = 1;
        else
            $case[CaseModel::COL_CLOSED] = 0;

        $case->save();
        return $case;
    }

    public function solveCase($id)
    {
        $case = CaseModel::find($id);
        if($case == null)
            return null;
        $case[CaseModel::COL_CLOSED] = 1;
        $case[CaseModel::COL_SOLVED] = 1;
        $case->save();
        return $case;
    }
}
?>