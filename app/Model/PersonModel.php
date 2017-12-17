<?php

namespace App\Model;

use CreatePersonTable;
use Illuminate\Database\Eloquent\Model;

class PersonModel extends Model
{
    const TABLE_NAME = "Person";
    const COL_ID =  "person_id";
    const COL_SURNAME = "surname" ;
    const COL_NAME = "name" ;
    const COL_ADD = "address";
    const COL_DOB = "date_of_birth";

    protected $connection = 'mysql';

    use SoftDeletes;
    protected $table = self::TABLE_NAME;
    protected $primaryKey = self::COL_ID;
    protected $fillable =[
        self::COL_NAME,
        self::COL_SURNAME,
        self::COL_ADD,
        self::COL_DOB
    ];
}
