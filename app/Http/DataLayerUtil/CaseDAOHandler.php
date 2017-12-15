<?php
namespace App\Http;
use App\CaseModel;
use App\Http\ICaseDaoHandler;

/**
 * Created by PhpStorm.
 * User: mok00
 * Date: 12/12/2017
 * Time: 9:50 AM
 */
class CaseDAOHandler implements ICaseDaoHandler
{
    private $caseModel;
    const UNSOLVED_CASE = 0;
    const SOLVED_CASE = self::UNSOLVED_CASE + 1;
    const CLOSE_CASE = self::SOLVED_CASE + 1;
    private static $typeArr = [
        self::UNSOLVED_CASE => CaseModel::COL_SOLVED,
        self::SOLVED_CASE => CaseModel::COL_SOLVED,
        self::CLOSE_CASE => CaseModel::COL_CLOSED,
    ];

    /**
     * CaseDAO constructor.
     */
    public function __construct(CaseModel $caseModel)
    {
        $this->caseModel = $caseModel;
    }


    public function getCaseRow($sortBy, $order, $type, $val)
    {
        // TODO: Implement getCaseRow() method.
        return $this->caseModel->where(self::$typeArr[$type], $val)->orderBy($sortBy, $order)->get();
    }

    public function all()
    {
        // TODO: Implement all() method.
        return $this->caseModel->all();
    }

    public function find($id)
    {
        // TODO: Implement find() method.
        return $this->caseModel->find($id);

    }

    public function addCaseIndataBase($name, $type, $solved, $closed, $crimeDate, $depID, $oDAY, $description, $time)
    {
        // TODO: Implement addCaseIndataBase() method.
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

    public function setCaseClose($id)
    {
        $case = $this->caseModel->find($id);
        if($case == null)
            return null;
        $case[CaseModel::COL_CLOSED] = 1;
        $case->save();
        return $case;
        // TODO: Implement setCaseClose() method.
    }

    public function setCaseOpen($id)
    {
        // TODO: Implement setCaseOpen() method.
        $case = $this->caseModel->find($id);
        if($case == null)
            return null;
        $case[CaseModel::COL_CLOSED] = 0;
        $case->save();
        return $case;
    }

    public function setCaseSolved($id)
    {
        // TODO: Implement setCaseSolved() method.
        $case = $this->caseModel->find($id);
        if($case == null)
            return null;
        $case[CaseModel::COL_CLOSED] = 1;
        $case[CaseModel::COL_SOLVED] = 1;
        $case->save();
        return $case;
    }
}