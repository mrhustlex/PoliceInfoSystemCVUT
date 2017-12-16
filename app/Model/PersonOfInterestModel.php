<?php

namespace App\Model;

use CreatePersonOfInterest;
use CreateTestimonyTable;
use Illuminate\Database\Eloquent\Model;

class PersonOfInterestModel extends Model
{
    protected $table = CreatePersonOfInterest::TABLE_NAME;
    protected $primaryKey = CreatePersonOfInterest::COL_ID;
    public $timestamps = false;


    public function Role()
    {
        return $this->hasOne(RoleOfPOIModel::class, CreatePersonOfInterest::COL_ID);
    }

    public function Testimony()
    {
        return $this->hasMany(CreateTestimonyTable::class, CreateTestimonyTable::COL_POIID);
    }



}
