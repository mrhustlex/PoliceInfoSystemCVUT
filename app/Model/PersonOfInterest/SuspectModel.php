<?php

namespace App\Model;

use CreateRoleOfPOI;
use CreateSuspect;
use Illuminate\Database\Eloquent\Model;

class SuspectModel extends Model
{
    protected $table = "suspect" ;
    protected $primaryKey = "suspectId";
    public $timestamps = false;
    protected $fillable = [
        "suspectId"
    ];

    public function role()
    {
        return $this->belongsTo(RoleOfPOIModel::class, "suspectId", "rolePOIid" );
    }
}
