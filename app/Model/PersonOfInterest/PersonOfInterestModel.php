<?php

namespace App\Model;
use CreatePersonOfInterestTable;
use CreateTestimonyTable;
use Illuminate\Database\Eloquent\Model;

class PersonOfInterestModel extends Model
{
//    const TABLE_NAME = "personOfInterest";
//    const COL_ID = "personOfInterestId";
    protected $table = "personOfInterest";
    protected $primaryKey = "personOfInterestId";
    public $timestamps = false;


    public function Role()
    {
        return $this->hasOne(RoleOfPOIModel::class, "personOfInterestId");
    }

    public function Testimony()
    {
        return $this->hasMany(TestimonyModel::class, "poiId");
    }

    public function Case()
    {
        return $this->belongsTo(CaseModel::class, "personOfInterestId");
    }

}
