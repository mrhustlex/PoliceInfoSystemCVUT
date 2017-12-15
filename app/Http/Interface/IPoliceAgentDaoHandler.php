<?php
/**
 * Created by PhpStorm.
 * User: mok00
 * Date: 12/15/2017
 * Time: 11:28 AM
 */

namespace App\Http;


interface IPoliceAgentDaoHandler
{
    public function getPoliceRow($sortBy, $order, $type, $val);
    public function all();
    public function find($id);


}