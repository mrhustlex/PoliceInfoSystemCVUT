<?php
namespace App\Http;
use App\CaseModel;
use App\Http\CaseDaoHandler;

/**
 * Created by PhpStorm.
 * User: mok00
 * Date: 12/12/2017
 * Time: 9:50 AM
 */
class CaseDAO implements CaseDaoHandler
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
}