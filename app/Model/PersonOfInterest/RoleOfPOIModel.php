<?php

namespace App\Model;

use CreateRoleOfPOI;
use Illuminate\Database\Eloquent\Model;

class RoleOfPOIModel extends Model
{
    protected $table = CreateRoleOfPOI::TABLE_NAME;
    protected $primaryKey = CreateRoleOfPOI::COL_POIID;
    protected $fillable =[
        CreateRoleOfPOI::COL_ROLEPOIID,
        CreateRoleOfPOI::COL_POIID
    ];
    public $timestamps = false;

    public function POI()
    {
        return $this->belongsTo(PersonOfInterestModel::class, CreateRoleOfPOI::COL_POIID);
    }



}
