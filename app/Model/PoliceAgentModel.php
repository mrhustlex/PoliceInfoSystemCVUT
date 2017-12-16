<?php

namespace App\Model;
use CreatePoliceAgentTable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PoliceAgentModel extends Model
{
    const TABLE_NAME = 'agents';
    const COL_ID = 'police_id';
    const COL_NAME = 'police_name';
    const COL_POS = 'police_position';
    const COL_NUM_CASE = 'num_case';
    protected $connection = 'mysql';

    use SoftDeletes;
    protected $table = self::TABLE_NAME;
    protected $primaryKey = self::COL_ID;
    protected $fillable =[
        self::COL_NAME,
        self::COL_POS,
        self::COL_NUM_CASE
    ];
    public $timestamps = false;
    protected $dates = ['deleted_at'];
    protected $hidden = ['deleted_at'];

}
