<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CaseModel extends Model
{
    const TABLE_NAME = "case";
    const COL_ID = "CaseID";
    const COL_DEP_ID = "DepartmentID";
    const COL_NAME = "Name";
    const COL_TYPE = "Type";
    const COL_DES = "Description";
    const COL_SOLVED = "Solved";
    const COL_CLOSED = "Closed";
    const COL_CRIME_DATE = "Crime_date";
    const COL_O_DAY = "Open_date";

    protected $table = self::TABLE_NAME;
    protected $primaryKey = self::COL_ID;
    protected $fillable =[
        self::COL_DEP_ID,
        self::COL_NAME,
        self::COL_TYPE,
        self::COL_DES,
        self::COL_SOLVED,
        self::COL_CLOSED,
        self::COL_O_DAY
    ];
    public $timestamps = false;
    protected $dates = [self::COL_CRIME_DATE];
}
