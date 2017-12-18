<?php

namespace App\Model;
use CreateHeadOfDepartment;
use CreateDetective;
use CreateChiefOfficer;
use CreateOfficer;
use CreatePoliceAgent;
use CreateRolePolice;
use App\Model\PoliceAgentModel;


use Illuminate\Database\Eloquent\Model;

class RolePoliceModel extends Model
{
    const TABLE_NAME = "rolePolice";
    const COL_ID = "rolePolice_id";
    const COL_POLID = "policeAgent_id";

    protected $table = self::TABLE_NAME;
    protected $primaryKey = self::COL_ID;
    protected $fillable = [
    	self::COL_POLID
    ];

    public $timestamps = false;

    public function HeadOfTheDepartment(){
    	return $this->hasMany(HeadOfTheDepartmentModel::class, "headOfDepartment_id");
    }

    public function Detective(){
    	return $this->hasMany(DetectiveModel::class, "detective_id");
    }

    public function ChiefOfficer(){
    	return $this->hasMany(ChiefOfficerModel::class, "chiefOfficer_id");
    }

    public function Officer(){
    	return $this->hasMany(OfficerModel::class, "officer_id");
    }

    public function CrimeSceneInvestigator(){
    	return $this->hasMany(CrimeSceneInvestigatorModel::class, "crimeSceneInvestigator_id");
    }

    public function PoliceAgent(){
    	return $this->hasMany(PoliceAgentModel::class, "policeAgent_id");
    }    


}
