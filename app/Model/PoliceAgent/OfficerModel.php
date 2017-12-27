<?php

namespace App\Model;

use CreateRolePolice;
use CreateOfficer;
use Illuminate\Database\Eloquent\Model;

class OfficerModel extends Model
{
    const TABLE_NAME = "officer";
    const COL_ID = "officer_id";
    public $autoincrement = false;

    protected $table = self::TABLE_NAME;
    protected $primaryKey = self::COL_ID;

    protected $fillable = [
        "officer_id"
    ];


    public $timestamps = false;

    public function role()
    {
        return $this->belongsTo(RolePoliceModel::class, "rolePolice_id");
    }
}
