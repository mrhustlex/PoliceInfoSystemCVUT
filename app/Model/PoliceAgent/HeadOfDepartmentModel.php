<?php

namespace App\Model;

use RolePoliceModel;
use CreateRolePolice;
use CreateHeadOfDepartment;
use Illuminate\Database\Eloquent\Model;

class HeadOfDepartmentModel extends Model
{
    const TABLE_NAME = "headOfDepartment";
    const COL_ID = "headOfDepartment_id";

    protected $table = self::TABLE_NAME;
    protected $primaryKey = self::COL_ID;

    public $timestamps = false;

    public function role()
    {
        return $this->belongsTo(RolePoliceModel::class, "rolePolice_id");
    }
}
