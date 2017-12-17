<?php

namespace App\Model;

use CreatePersonTable;
use Illuminate\Database\Eloquent\Model;

class PersonModel extends Model
{
    const TABLE_NAME = CreatePersonTable::TABLE_NAME;
    const COL_ID = CreatePersonTable::COL_ID;
    const COL_SURNAME = CreatePersonTable::COL_SURNAME;
    const COL_NAME = CreatePersonTable::COL_NAME;
    const COL_ADD = CreatePersonTable::COL_ADD;
    const COL_DOB = CreatePersonTable::COL_DOB;

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
