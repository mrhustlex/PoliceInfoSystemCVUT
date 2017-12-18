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
        , CaseModel $caseModel)
    {
        $this->poiModel = $poiModel;
        $this->caseModel = $caseModel;
    }


    public function getPersonOfInterest($case_id)
    {
        // TODO: Implement getPersonOfInterest() method.
        $case = $this->caseModel->find($case_id);
        $poiGroup = $case->POIGroup;
        return $poiGroup;
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

    public function getTestimony($poi_id)
    {
        // TODO: Implement getTestimony() method.
        $poi = $this->poiModel->find($poi_id);
        if($poi == null)
            return null;
        $testimony = $poi->Testimony;
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
            "person_id" => $person[PersonModel::COL_ID],
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

    public function setSuspect($poi_id)
    {
        // TODO: Implement setSuspect() method.
        $poi = $this->poiModel->find($poi_id);
        $role = $poi->Role;
        if($role == null)
            return "role not found";
        if($role->Suspect == null){
            $role_id = $role["rolePOIid"];
            $suspect = new SuspectModel([
                "suspectId" => $role_id
            ]);
            $suspect->save();
            $suspect->role()->associate($role);
            $suspect->save();
            return $suspect;
        }
        return $role->Suspect;
    }

    public function setCriminal($poi_id)
    {
        // TODO: Implement setCriminal() method.
        $poi = $this->poiModel->find($poi_id);
        $role = $poi->Role;
        if($role == null)
            return "role not found";
        if($role->Criminal == null){
            $role_id = $role["rolePOIid"];
            $criminal = new CriminalModel([
                "criminalId" => $role_id
            ]);
            $criminal->save();
            $criminal->role()->associate($role);
            $criminal->save();
            return $criminal;
        }
        return $role->Criminal;
    }

    public function setVictim($poi_id)
    {
        // TODO: Implement setVictim() method.
        $poi = $this->poiModel->find($poi_id);
        $role = $poi->Role;
//        echo $poi;
        if($role == null)
            return "role not found";
        if($role->Victim == null) {
            $role_id = $role["rolePOIid"];
            $victim = new VictimModel([
                "victimId" => $role_id
            ]);
            $victim->save();
            $victim->role()->associate($role);
            $victim->save();
            return $victim;
        }
        return $role->Victim;
    }

    public function setWitness($poi_id)
    {
        // TODO: Implement setWitness() method.
        $poi = $this->poiModel->find($poi_id);
        $role = $poi->Role;
        if($role == null)
            return "role not found";
        if($role->Witness == NULL){
            $role_id = $role["rolePOIid"];
            $witness = new WitnessModel([
                "witnessId" =>$role_id
            ]);
            $witness->save();
            $witness->role()->associate($role);
            $witness->save();
            return $witness;
        }
        return $role->Witness;
    }
    public function getPersonOfInterestDetail($poi_id)
    {
        // TODO: Implement getPersonOfInterestDetail() method.
//        $poi = $this->poiModel->where(["invalid" => 0, "personOfInterestId" => $poi_id])->first();
        $poi = $this->poiModel->find($poi_id);

        if($poi == null)
            return null;
        $person_detail = $poi->Person;
        $person_detail = $person_detail->setAttribute('poi_id', $poi_id);
        return $person_detail->toArray();
    }


    public function getSuspect($poi_id)
    {
        // TODO: Implement getSuspect() method.
        $role = self::getRole($poi_id);
        if($role != null)
            return $role->Suspect;
        return null;
    }

    public function getCriminal($poi_id)
    {
        // TODO: Implement getCriminal() method.
        $role = self::getRole($poi_id);
        if($role != null)
            return $role->Criminal;
        return null;
    }

    public function getVictim($poi_id)
    {
        // TODO: Implement getVictim() method.
        $role = self::getRole($poi_id);
        if($role != null)
            return $role->Victim;
        return null;
    }

    public function getWitness($poi_id)
    {
        // TODO: Implement getWitness() method.
        $role = self::getRole($poi_id);
        if($role != null)
            return $role->Witness;
        return null;
    }
    public function getRole($poi_id)
    {
        $poi = $this->poiModel->find($poi_id);
        if($poi != null)
           return $poi->Role;
        return null;
    }

    public function getCase($poi_id)
    {
        // TODO: Implement getCaseId() method.
        $poi = $this->poiModel->find($poi_id);
        $case = $poi->POILink->Case;
        if($case === null)
            return null;
        return $case;
    }

    public function inactivatePersonOfInterest($poi_id)
    {
        // TODO: Implement inactivatePersonOfInterest() method.
        $poi = $this->poiModel->find($poi_id);
        if($poi == null)
            return null;
        $poi["invalid"] = true;
        $poi->save();
        if(self::isPersonOfInterestActive($poi_id))
            return false;
        return true;
    }

    public function reactivatePersonOfInterest($poi_id)
    {
        // TODO: Implement reactivatePersonOfInterest() method.
        $poi = $this->poiModel->find($poi_id);
        if($poi == null)
            return null;
        if($poi["invalid"] == false)
            return false;
        $poi["invalid"] = false;
        $poi->save();
        if(self::isPersonOfInterestActive($poi_id))
            return true;
        return false;
    }

    public function isPersonOfInterestActive($poi_id)
    {
        // TODO: Implement isPersonOfInterestActive() method.
        if($this->poiModel->where(["invalid" => 0, "personOfInterestId" => $poi_id])->first() == null)
            return false;
        else
            return true;
    }
}