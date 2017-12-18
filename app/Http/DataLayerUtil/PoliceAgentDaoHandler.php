<?php
/**
 * Created by PhpStorm.
 * User: mok00
 * Date: 12/15/2017
 * Time: 11:27 AM
 */

namespace App\Http;


use App\Model\PoliceAgentModel;
use App\Model\RolePoliceModel;
use App\Model\OfficerModel;
use App\Model\CrimeSceneInvestigatorModel;
use App\Model\DetectiveModel;
use App\Model\HeadOfDepartmentModel;
use App\Model\ChiefOfficerModel;
use App\Model\PersonModel;
use App\Model\DepartmentModel;


class PoliceAgentDaoHandler implements IPoliceAgentDaoHandler
{
    private $policeAgentModel;
    private $rolePoliceModel;
    private $officerModel;
    private $investigatorModel;
    private $detectiveModel;
    private $headOfDepartmentModel;
    private $chiefOfficerModel;
    private $departmentModel;

    /**
     * PoliceAgentDAOHandler constructor.
     * @param $policeAgentModel;
     * @param $rolePoliceModel;
     * @param $officerModel;
     * @param $investigatorModel;
     * @param $detectiveModel
     * @param $headOfDepartmentModel;
     * @param $chiefOfficerModel;
     */
    public function __construct(PoliceAgentModel $policeAgentModel, RolePoliceModel $rolePoliceModel,OfficerModel $officerModel,CrimeSceneInvestigatorModel $investigatorModel,DetectiveModel $detectiveModel,HeadOfDepartmentModel $headOfDepartmentModel,ChiefOfficerModel $chiefOfficerModel, DepartmentModel $departmentModel)
    {
        $this->policeAgentModel = $policeAgentModel;
        $this->rolePoliceModel = $rolePoliceModel;
        $this->officerModel = $officerModel;
        $this->investigatorModel = $investigatorModel;
        $this->detectiveModel = $detectiveModel;
        $this->headOfDepartmentModel = $headOfDepartmentModel;
        $this->chiefOfficerModel = $chiefOfficerModel;
        $this->departmentModel = $departmentModel;
    }


    public function all()
    {
        return $this->policeAgentModel->all();
    }

    public function getPoliceAgentDetail($id){
        $policeAgent = $this->policeAgentModel->find($id);

        if($policeAgent == null)
            return null;

        return $policeAgent;
    }

    public function addPoliceAgent($department_id,$name, $surname, $address, $date, $usr, $pwd){
        $department = $this->departmentModel->find($department_id);
        if($department == NULL)
            return NULL;

        $person = new PersonModel([
            PersonModel::COL_SURNAME => $surname,
            PersonModel::COL_NAME => $name,
            PersonModel::COL_ADD => $address,
            PersonModel::COL_DOB => $date
        ]);
        $person->save();

        $policeAgent = new PoliceAgentModel(["
            PoliceAgent_id" => $person[PersonModel::COL_ID]
        ]);
        $policeAgent->save();

        $police_link_department = self::makeDepartmentLink($policeAgent["policeAgent_id"], $department_id);
        
        $police_link_department->department()->associate($department);
        $police_link_department->save();

        $policeAgent->PoliceAgentLink()->associate($police_link_department);
        $policeAgent->save();

        $role = self::makeRoleLink($policeAgent["policeAgent_id"]);
        $role->policeAgent()->associate($policeAgent);

        return $policeAgent;
    }

    public function makeDepartmentLink($policeAgent_id, $department_id){
        $policeAgent_department = new PoliceAgentToDepartmentModel([
            "policeAgent_id" => $policeAgent_id,
            "department_id" => $department_id
        ]);
    }

    public function makeRoleLink($policeAgent_id){
        $policeAgent_role = new RolePoliceMode([
            "policeAgent_id" => $policeAgent_id
        ]);
        $policeAgent_role->save();

        return $policeAgent_role;
    }

    public function setOfficer($policeAgent_id){
        $policeAgent = $this->policeAgentModel->find($policeAgent_id);
        $role = $policeAgent->Role();

        if($role->officer() == NULL){
            $role_id = $role['rolePolice_id'];
            $officer = new OfficerModel([
                "officer_id" => $role_id
            ]);
            $officer->save();
            $officer->associate($role);
            return $officer;
        }
        return $role->officer();
    }

    public function setInvestigator($policeAgent_id){
        $policeAgent = $this->policeAgentModel->find($policeAgent_id);
        $role = $policeAgent->Role();

        if($role->CrimeSceneInvestigator() == NULL){
            $role_id = $role['rolePolice_id'];
            $officer = new CrimeSceneInvestigatorModel([
                "crimeSceneInvestigator_id" => $role_id
            ]);
            $officer->save();
            $officer->associate($role);
            return $officer;
        }
        return $role->CrimeSceneInvestigator();
    }

    public function setDetective($policeAgent_id){
        $policeAgent = $this->policeAgentModel->find($policeAgent_id);
        $role = $policeAgent->Role();

        if($role->Detective() == NULL){
            $role_id = $role['rolePolice_id'];
            $detective = new DetectiveModel([
                "detective_id" => $role_id
            ]);
            $detective->save();
            $detective->associate($role);
            return $detective;
        }
        return $role->Detective();
    }

    public function setHeaddpt($policeAgent_id){
        $policeAgent = $this->policeAgentModel->find($policeAgent_id);
        $role = $policeAgent->Role();

        if($role->HeadOfTheDepartment() == NULL){
            $role_id = $role['rolePolice_id'];
            $headdpt = new  HeadOfDepartmentModel([
                "headOfDepartment_id" => $role_id
            ]);
            $headdpt->save();
            $headdpt->associate($role);
            return $headdpt;
        }
        return $role->HeadOfTheDepartment();
    }

    public function setChief($policeAgent_id){
        $policeAgent = $this->policeAgentModel->find($policeAgent_id);
        $role = $policeAgent->Role();

        if($role->ChiefOfficer() == NULL){
            $role_id = $role['rolePolice_id'];
            $chief = new  ChiefOfficerModel([
                "chiefOfficer_id" => $role_id
            ]);
            $chief->save();
            $chief->associate($role);
            return $chief;
        }
        return $role->HeadOfTheDepartment();
    }
    

    public function getPolice($id)
    {
        // TODO: Implement getPolice() method.
        return $this->police_model->find($id);
    }
}