<?php

namespace App\Model;

use App\PoliceAgentToDepartmentModel;
use RolePoliceModel;
use CreatePoliceAgent;
use CreateRolePolice;
use CreatePersonTable;
use App\Model\DepartmentModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthContract;

class PoliceAgentModel extends Model implements AuthContract
{
      // use Illuminate\Contracts\Auth\Authenticatable;
    const TABLE_NAME = "policeAgent";
    const COL_ID = "policeAgent_id";
    const COL_USERNAME = "username";
    const COL_PASSWORD = "password";
    const COL_DEPID = "department_id";
    const COL_ROLPOLID = "rolePolice_id";
    const COL_POLSTAID = "policeStation_id";


    protected $table = self::TABLE_NAME;
    protected $primaryKey = self::COL_ID;
    public $incrementing = false;
    protected $fillable = [
        self::COL_ID,
	    self::COL_USERNAME,
	    self::COL_PASSWORD,
	    self::COL_DEPID,
	    self::COL_ROLPOLID,
	    self::COL_POLSTAID,
    ];

    public $timestamps = false;


    public function Role()
    {
        return $this->hasOne(RolePoliceModel::class, "rolePolice_id");
    }

    public function PoliceAgentLink()
    {
        return $this->belongsTo(PoliceAgentToDepartmentModel::class, "policeAgent_id", "policeAgent_id");
    }

    public function Person()
    {
        return $this->belongsTo(PersonModel::class, "person_id", "person_id");
    }

    public function getAuthIdentifierName(){
        return self::COL_ID;
    }
    public function getAuthIdentifier(){
        return $this->policeAgent_id;
    }
    public function getAuthPassword(){
        return $this->password;
    }
    public function getRememberToken(){
        return $this->primaryKey;
    }
    public function setRememberToken($value){
        return $this->primaryKey;
    }
    public function getRememberTokenName(){
        return self::COL_USERNAME;
    }

}
