<?php
/**
 * Created by PhpStorm.
 * User: mok00
 * Date: 12/15/2017
 * Time: 11:26 AM
 */

namespace App\Http;


use App\Model\CaseModel;
use App\Model\CriminalModel;
use App\Model\PersonOfInterestModel;
use App\Model\RoleOfPOIModel;
use App\Model\SuspectModel;
use App\Model\TestimonyModel;
use App\Model\VictimModel;
use App\Model\WitnessModel;

class POIDAOHandler implements IPOIDaoHandler
{
    private $poiModel;
    private $criminalModel;
    private $roleOfPOIModel;
    private $suspectModel;
    private $testimonyModel;
    private $victimModel;
    private $witnessModel;
    private $caseModel;

    /**
     * POIDAOHandler constructor.
     * @param $poiModel
     * @param $criminalModel
     * @param $roleOfPOIModel
     * @param $suspectModel
     * @param $testimonyModel
     * @param $victimModel
     * @param $witnessModel
     * @param $caseModel
     */
    public function __construct(PersonOfInterestModel $poiModel
        , CriminalModel $criminalModel, RoleOfPOIModel $roleOfPOIModel
        , SuspectModel $suspectModel, TestimonyModel $testimonyModel
        , VictimModel $victimModel, WitnessModel $witnessModel, CaseModel $caseModel)
    {
        $this->poiModel = $poiModel;
        $this->criminalModel = $criminalModel;
        $this->roleOfPOIModel = $roleOfPOIModel;
        $this->suspectModel = $suspectModel;
        $this->testimonyModel = $testimonyModel;
        $this->victimModel = $victimModel;
        $this->witnessModel = $witnessModel;
        $this->caseModel = $caseModel;
    }


    public function getPersonOfInterest($id)
    {
        // TODO: Implement getPersonOfInterest() method.
        $case = $this->caseModel->find($id);
        $poi = $case->POI();
        return $poi;

    }

    public function all()
    {
        // TODO: Implement all() method.
    }

    public function find($id)
    {
        // TODO: Implement find() method.
    }

    public function addTestimony($poi_id, $type, $date, $statement)
    {
        // TODO: Implement addTestimony() method.
        $poi = $this->poiModel->find($poi_id);
        $testimony = new TestimonyModel([
            "type" => $type,
            "date" => $date,
            "statement" => $statement
        ]);

        $testimony['poiId'] = $poi["personOfInterestId"];
        $testimony->save();
        $testimony->POI()->associate($poi);
        $testimony->save();
        return $testimony;
    }

    public function getTestimony($case_id)
    {
        // TODO: Implement getTestimony() method.
        $case = $this->caseModel->find($case_id);
        $testimony = $case->POI()->Testimony();
        return $testimony;
    }

    public function getSuspect($case_id)
    {
        // TODO: Implement getSuspect() method.
        $case = $this->caseModel->find($case_id);
        $suspect = $case->POI()->Role()->Suspect();
        return $suspect;
    }

    public function getCriminal($case_id)
    {
        // TODO: Implement getCriminal() method.
        $case = $this->caseModel->find($case_id);
        $criminal = $case->POI()->Role()->Criminal();
        return $criminal;
    }

    public function getVictim($case_id)
    {
        // TODO: Implement getVictim() method.
        $case = $this->caseModel->find($case_id);
        $victim = $case->POI()->Role()->Victim();
        return $victim;
    }

    public function getWitness($case_id)
    {
        // TODO: Implement getWitness() method.
        $case = $this->caseModel->find($case_id);
        $witness = $case->POI()->Role()->Witness();
        return $witness;
    }

    public function getRowTitle()
    {
        // TODO: Implement getRowTitle() method.
    }
}