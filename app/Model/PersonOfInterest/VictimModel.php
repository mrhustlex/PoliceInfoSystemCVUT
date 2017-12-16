<?php

namespace App\Model;

use CreateRoleOfPOI;
use CreateVictim;
use Illuminate\Database\Eloquent\Model;

class VictimModel extends Model
{
    protected $table = "victim" ;
    protected $primaryKey = "victimId";
    public $timestamps = false;

    public function role()
    {
        return $this->belongsTo(RoleOfPOIModel::class, "POIid" );
    }

}
