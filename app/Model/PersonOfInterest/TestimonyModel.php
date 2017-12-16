<?php

namespace App\Model;

use CreateRoleOfPOI;
use CreateTestimonyTable;
use Illuminate\Database\Eloquent\Model;

class TestimonyModel extends Model
{
    protected $table = "testimony";
    protected $primaryKey = "testimonyId" ;
    protected $fillable =[
        "type",
        "date",
        "statement"
    ];
    public $timestamps = false;

    public function POI()
    {
        return $this->belongsTo(PersonOfInterestModel::class,  "poiId");
    }

}
