<?php


namespace App\Http;
use App\CaseModel;
use Illuminate\Http\Request;


/**
 * It provides implementation of ICaseHandler(interface).
 * @author YuJin
 * @version 1.0
 * @created 05-Dec-2017 1:43:45 PM
 */
class caseHandler implements ICaseHandler
{
    private $caseDAO;


    function __construct(ICaseDaoHandler $caseDAO)
    {
        $this->caseDAO = $caseDAO;
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
        $case = $this->caseDAO->addCaseIndataBase($name, $type, $solved, $closed, $crimeDate, $depID, $oDAY, $description, $time);
        if($case == null)
            return null;
        else
            return $case;
	}

//	public function editCase($name, $type, $solved, $closed, $crimeDate, $depID, $oDAY, $description, $time)
//	{
//	    return true;
//	}

	/**
	 * 
	 * @param id
	 */
	public function getCase(int $id)
	{
        $case = $this->caseDAO->find($id);
        if($case == Null)
            return Null;
        return $case;
	}

	public function getCaseList($sortBy, $order, $type = CaseDAOHandler::UNSOLVED_CASE)
	{
        $val = ($type == CaseDAOHandler::UNSOLVED_CASE)? 0: 1;
        $cases = $this->caseDAO->getCaseRow($sortBy, $order, $type, $val);
        if($cases == null)
            return null;
        return $cases;

	}

    public function closeCase($id)
    {
        $case = $this->caseDAO->setCaseClose($id);
        if($case == null)
            return null;
        return $case;
    }

    public function openCase($id)
    {
        $case = $this->caseDAO->setCaseOpen($id);
        if($case == null)
            return null;
        return $case;
    }

    public function solveCase($id)
    {
        $case = $this->caseDAO->setCaseSolved($id);
        if($case == null)
            return null;
        return $case;
    }
}
?>