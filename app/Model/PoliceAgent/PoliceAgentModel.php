<?php

namespace App;

use CreatePoliceAgent;
use CreateRolePolice;
use CreatePersonTable;

use Illuminate\Database\Eloquent\Model;

class PoliceAgentModel extends Model
{
    const TABLE_NAME = "policeAgent";
    const COL_ID = "policeAgent_id";
    const COL_USERNAME = "username";
    const COL_PASSWORD = "password";
    const COL_DEPID = "department_id";
    const COL_ROLPOLID = "rolePolice_id";
    const COL_POLSTAID = "policeStation_id";

    protected $table = self::TABLE_NAME;
    protected $primaryKey = self::COL_ID;
    
    protected $fillable = [
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
}