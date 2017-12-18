<?php

namespace App;

use App\Model\DepartmentModel;
use App\Model\PoliceAgentModel;
use CreatePoliceAgentLinkToDepartmentTable;
use Illuminate\Database\Eloquent\Model;

class POIToCaseModel extends Model
{
    protected $table = 'policeLinkToDepartment';
    protected $primaryKey = "policeLinkToDepartment_id";
    protected $fillable = [
        "policeAgent_id",
        "department_id"
    ];

    public $timestamps = false;
    public function department()
    {
        return $this->belongsTo(DepartmentModel::class, 'department_id', 'department_id');
    }

    public function PoliceAgent()
    {
        return $this->hasOne(PoliceAgentModel::class, 'policeAgent_id', 'policeAgent_id');
    }

}
