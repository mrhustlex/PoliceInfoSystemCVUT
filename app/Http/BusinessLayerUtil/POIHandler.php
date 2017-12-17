<?php
/**
 * Created by PhpStorm.
 * User: mok00
 * Date: 12/15/2017
 * Time: 11:25 AM
 */

namespace App\Http;


class POIHandler implements  IPOIHandler
{
    private $ipolice_dao;

    /**
     * POIHandler constructor.
     * @param $ipolice_dao
     */
    public function __construct(IPOIDaoHandler $ipolice_dao)
    {
        $this->ipolice_dao = $ipolice_dao;
    }

    public function getPersonOfInterest($case_id)
    {
        return $this->ipolice_dao->getPersonOfInterest($case_id);
    }


    public function deletePersonOfInterest($id)
    {
        // TODO: Implement deletePersonOfInterest() method.
    }

    public function modifyPersonOfInterest($id)
    {
        // TODO: Implement modifyPersonOfInterest() method.
    }

    public function getPersonOfInterestList($sortBy, $order, $type)
    {
//        $val = ($type == CaseDAOHandler::UNSOLVED_CASE)? 0: 1;
        $val = null;
        $POI = $this->ipolice_dao->getPersonOfInterest($sortBy, $order, $type, $val);
        if($POI == null)
            return null;
        return $POI;
    }

    public function getPersonOfInterestTitle()
    {
        // TODO: Implement getPersonOfInterestTitle() method.
    }

    public function addTestimony($poi_id, $type, $date, $statement)
    {
        // TODO: Implement addTestimony() method.
        return $this->ipolice_dao->addTestimony($poi_id, $type, $date, $statement);
    }

    public function addPersonOfInterest($case_id, $name, $surname, $address, $date)
    {
        // TODO: Implement addPersonOfInterest() method.
        return $this->ipolice_dao->addPersonOfInterest($case_id, $name, $surname, $address, $date);
    }
}