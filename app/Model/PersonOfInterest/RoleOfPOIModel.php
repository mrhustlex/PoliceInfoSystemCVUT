<?php

namespace App\Model;

use CreateCriminal;
use CreatePersonOfInterestTable;
use CreateRoleOfPOI;
use CreateSuspect;
use CreateTestimonyTable;
use CreateVictim;
use CreateWithness;
use Illuminate\Database\Eloquent\Model;

class RoleOfPOIModel extends Model
{
    protected $table = "roleOfPOI" ;
    protected $primaryKey = "POIid";
    public $timestamps = false;

    public function POI()
    {
        return $this->belongsTo(PersonOfInterestModel::class,  "POIid");
    }

    public function Testimony()
    {
        return $this->hasMany(TestimonyModel::class, "rolePOIid");
    }
    public function Victim()
    {
        return $this->hasMany(VictimModel::class, "rolePOIid");
    }
    public function Witness()
    {
        return $this->hasMany(WitnessModel::class, "rolePOIid");
    }
    public function Suspect()
    {
        return $this->hasMany(SuspectModel::class, "rolePOIid");
    }

    public function Criminal()
    {
        return $this->hasMany(CriminalModel::classl, "rolePOIid");
    }

}
