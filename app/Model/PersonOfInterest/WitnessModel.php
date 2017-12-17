<?php

namespace App\Model;

use CreateRoleOfPOI;
use CreateWithness;
use Illuminate\Database\Eloquent\Model;

class WitnessModel extends Model
{
    protected $table = "witness";
    protected $primaryKey = "witnessId";
    public $timestamps = false;
    protected $fillable =[
        "witnessId"
    ];
    public function role()
    {
        return $this->belongsTo(RoleOfPOIModel::class, "witnessId","rolePOIid");
    }

}
