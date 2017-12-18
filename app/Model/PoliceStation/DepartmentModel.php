<?php

namespace App\Model;


use CreatePoliceStation;
use CreateDepartment;
use CreateCaseTable;

use Illuminate\Database\Eloquent\Model;

class DepartmentModel extends Model
{
    protected $table = "department";
    protected $primaryKey = "department_id";

    protected $fillable = [
    	"name"
    ];

    public $timestamps = false;

    public function PoliceStation(){
    	return $this->belongsTo(PoliceStationModel::class, "policeStation_id");
    }

    public function Case(){
    	return $this->hasMany(CaseModel::class, "CaseID");
    }
}
