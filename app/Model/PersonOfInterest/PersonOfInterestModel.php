<?php

namespace App\Model;
use App\POIToCaseModel;
use CreatePersonOfInterestTable;
use CreateTestimonyTable;
use Illuminate\Database\Eloquent\Model;

class PersonOfInterestModel extends Model
{
//    const TABLE_NAME = "personOfInterest";
//    const COL_ID = "personOfInterestId";
    protected $table = "personOfInterest";
    protected $primaryKey = "personOfInterestId";
    protected $fillable = ["person_id"];
    public $timestamps = false;


    public function Role()
    {
        return $this->hasOne(RoleOfPOIModel::class, "personOfInterestId");
    }

    public function Testimony()
    {
        return $this->hasMany(TestimonyModel::class, "poiId");
    }

    public function POILink()
    {
        return $this->belongsTo(POIToCaseModel::class, "personOfInterestId", "poi_id");
    }

}
