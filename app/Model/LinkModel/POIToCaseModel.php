<?php

namespace App;

use App\Model\CaseModel;
use App\Model\PersonOfInterestModel;
use CreatePOILinkToCaseTable;
use Illuminate\Database\Eloquent\Model;

class POIToCaseModel extends Model
{
    protected $table = 'poi_link_to_case';
    protected $primaryKey = "id";
    protected $fillable = [
        "case_id",
        "poi_id"
    ];
    public $timestamps = false;
    public function case()
    {
        return $this->belongsTo(CaseModel::class, 'case_id', 'CaseID');
    }

    public function POI()
    {
        return $this->hasOne(PersonOfInterestModel::class, 'poi_id', 'POIId');
    }

}
