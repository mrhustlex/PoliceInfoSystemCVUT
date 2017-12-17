<?php

namespace App\Model;

use App\POIToCaseModel;
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
    protected $primaryKey = "rolePOIid";
    protected $fillable = ["POIid"];
    public $timestamps = false;

    public function POI()
    {
        return $this->belongsTo(PersonOfInterestModel::class,  "POIid", "personOfInterestId");
    }

    public function Victim()
    {
        return $this->hasMany(VictimModel::class, "victimId");
    }
    public function Witness()
    {
        return $this->hasMany(WitnessModel::class, "witnessId");
    }
    public function Suspect()
    {
        return $this->hasMany(SuspectModel::class, "suspectId");
    }

    public function Criminal()
    {
        return $this->hasMany(CriminalModel::class, "criminalId");
    }

}
