<?php

namespace App\Model;

use CreateDepartment
use CreatePoliceStation

use Illuminate\Database\Eloquent\Model;

class PoliceStationModel extends Model
{
    protected $table = "policeStation";
    protected $primaryKey = "policeStation_id";

    protected $fillable = [
    	"address",
    	"name"
    ];

    public $timestamps = false;

    public function Department(){
    	return $this->hasMany(DeparmentModel::class, "departmentId")
    }
}
