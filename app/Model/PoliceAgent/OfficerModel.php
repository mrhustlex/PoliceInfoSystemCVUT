<?php

namespace App\Model;

use CreateRolePolice
use CreateOfficer;
use Illuminate\Database\Eloquent\Model;

class OfficerModel extends Model
{
    const TABLE_NAME = "officer";
    const COL_ID = "officer_id";

    protected $table = self::TABLE_NAME;
    protected $primaryKey = self::COL_ID;

    public $timestamps = false;

    public function role()
    {
        return $this->belongsTo(RolePoliceModel::class, "rolePolice_id");
    }
}
