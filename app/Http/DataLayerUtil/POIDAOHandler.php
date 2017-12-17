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
use App\Model\PersonModel;
use App\Model\PersonOfInterestModel;
use App\Model\RoleOfPOIModel;
use App\Model\SuspectModel;
use App\Model\TestimonyModel;
use App\Model\VictimModel;
use App\Model\WitnessModel;
use App\POIToCaseModel;

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


    public function getPersonOfInterest($case_id)
    {
        // TODO: Implement getPersonOfInterest() method.
        $case = $this->caseModel->find($case_id);
        $poi = $case->POIGroup;
        return $poi;

    }

    public function addTestimony($poi_id, $type, $date, $statement)
    {
        // TODO: Implement addTestimony() method.
        $poi = $this->poiModel->find($poi_id);
        if($poi == null)
            return null;
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
        $testimony = $case->POILink()->Testimony();
        return $testimony;
    }


    public function addPersonOfInterest($case_id, $name, $surname, $address, $date)
    {
        // TODO: Implement addPersonOfInterest() method.
        $case = $this->caseModel->find($case_id);
        if($case == NULL)
            return  null;
        $person = new PersonModel([
            PersonModel::COL_SURNAME => $surname,
            PersonModel::COL_NAME => $name,
            PersonModel::COL_ADD => $address,
            PersonModel::COL_DOB => $date
        ]);
        $person->save();
        $poi = new PersonOfInterestModel([
            "person_id" => $person[PersonModel::COL_ID]
        ]);
        $poi->save();
        $poi_link_case = self::makeCaseLink($poi["personOfInterestId"], $case_id);
        $poi_link_case->case()->associate($case);
        $poi_link_case->save();
        $poi->POILink()->associate($poi_link_case);
        $poi->save();
        $role = self::makePoiLink($poi["personOfInterestId"]);
        $role->POI()->associate($poi);
        return $poi;
    }


    public function makeCaseLink($poi_id, $case_id){
        $poi_case = new POIToCaseModel([
            "poi_id" => $poi_id,
            "case_id" => $case_id
        ]);
        $poi_case->save();
        return $poi_case;
    }

    public function makePoiLink($poi_id){
        $poi_role = new RoleOfPOIModel([
            "POIid" => $poi_id
        ]);
        $poi_role->save();
        return $poi_role;
    }

    public function getRowTitle()
    {
        // TODO: Implement getRowTitle() method.
    }

    public function setSuspect($poi_id)
    {
        // TODO: Implement setSuspect() method.
        $role = $this->roleOfPOIModel->where("POIid" ,$poi_id)->first();
        if($role == null)
            return null;
        $suspect = new SuspectModel();
        $suspect->save();
        $suspect->role()->associate($role);
        $suspect->save();
        return $suspect;
    }

    public function setCriminal($poi_id)
    {
        // TODO: Implement setCriminal() method.
        $role = $this->roleOfPOIModel->where("POIid" ,$poi_id)->first();
        if($role == null)
            return null;
        $criminal = new CriminalModel();
        $criminal->save();
        $criminal->role()->associate($role);
        $criminal->save();
        return $criminal;
    }

    public function setVictim($poi_id)
    {
        // TODO: Implement setVictim() method.
        $role = $this->roleOfPOIModel->where("POIid" ,$poi_id)->first();
        if($role == null)
            return null;
        $victim = new VictimModel();
        $victim->save();
        $victim->role()->associate($role);
        $victim->save();
        return $victim;
    }

    public function setWitness($poi_id)
    {
        // TODO: Implement setWitness() method.
        $role = $this->roleOfPOIModel->where("POIid" ,$poi_id)->first();
        if($role == null)
            return null;
        $witness = new WitnessModel();
        $witness->save();
        $witness->role()->associate($role);
        $witness->save();
        return $witness;
    }
}