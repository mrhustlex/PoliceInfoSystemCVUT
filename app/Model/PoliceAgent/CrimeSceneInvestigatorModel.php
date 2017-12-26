<?php

namespace App\Model;

use RolePoliceModel;
use CreateRolePolice;
use CreateCrimeSceneInvestigator;
use Illuminate\Database\Eloquent\Model;

class CrimeSceneInvestigatorModel extends Model
{
    const TABLE_NAME = "crimeSceneInvestigator";
    const COL_ID = "crimeSceneInvestigator_id";

    protected $table = self::TABLE_NAME;
    protected $primaryKey = self::COL_ID;

    protected $fillable = [
        "crimeSceneInvestigator_id"
    ];

    public $timestamps = false;

    public function role()
    {
        return $this->belongsTo(RolePoliceModel::class, "rolePolice_id");
    }
}
