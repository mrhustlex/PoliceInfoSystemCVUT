<?php

namespace App\Model;

use CreateRoleOfPOI;
use CreateTestimonyTable;
use Illuminate\Database\Eloquent\Model;

class TestimonyModel extends Model
{
    protected $table = CreateTestimonyTable::TABLE_NAME;
    protected $primaryKey = CreateTestimonyTable::COL_ID;
    protected $fillable =[
        CreateTestimonyTable::COL_POIID,
        CreateTestimonyTable::COL_TYPE,
        CreateTestimonyTable::COL_DATE,
        CreateTestimonyTable::COL_STATEMENT
    ];
    public $timestamps = false;

    public function POI()
    {
        return $this->belongsTo(PersonOfInterestModel::class, CreateTestimonyTable::COL_POIID);
    }

}
