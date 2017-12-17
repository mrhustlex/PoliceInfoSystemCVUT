<?php

namespace App\Model;
use CreateCriminal;
use CreateRoleOfPOI;
use Illuminate\Database\Eloquent\Model;

class CriminalModel extends Model
{
    const TABLE_NAME = "criminal";
    const COL_ID = "criminalId";
    protected $table = self::TABLE_NAME;
    protected $primaryKey = self::COL_ID;
    public $timestamps = false;

    public function role()
    {
        return $this->belongsTo(RoleOfPOIModel::class, "rolePOIid");
    }

}
